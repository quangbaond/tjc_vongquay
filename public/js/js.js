window.onload = function () {
    // check if open dev tool
    function blockDevTools() {
        window.addEventListener('DOMContentLoaded', function () {
            if ((window.outerWidth - window.innerWidth) > 100 || (window.outerHeight - window.innerHeight) > 100) {
                $('body').html('<div style="text-align: center; margin-top: 20px;"><h1>Trang web không hỗ trợ DevTools</h1></div>');
                $('body').css('background', '#fff')
            }
        });
        var isDevToolsOpened = false;
        if ((window.outerWidth - window.innerWidth) > 100 || (window.outerHeight - window.innerHeight) > 100) {
            isDevToolsOpened = true;
        }
        window.addEventListener('resize', function () {
            if ((window.outerWidth - window.innerWidth) > 100 || (window.outerHeight - window.innerHeight) > 100) {
                isDevToolsOpened = true;
            } else {
                isDevToolsOpened = false;
            }
        });
        window.addEventListener('DOMContentLoaded', function () {
            if ((window.outerWidth - window.innerWidth) > 100 || (window.outerHeight - window.innerHeight) > 100) {
                isDevToolsOpened = true;
            }
        });
        setInterval(function () {
            if (isDevToolsOpened) {
                $(document).ready(function () {
                    $('body').html('<div style="text-align: center; margin-top: 20px;"><h1>Trang web không hỗ trợ DevTools</h1></div>');
                    $('body').css('background', '#fff')
                });
            }
        }, 1000);
    }
    var modalForm = new bootstrap.Modal(document.getElementById('modalForm'), {
        keyboard: false
    })
    var modalDetail = new bootstrap.Modal(document.getElementById('modalDetail'), {
        keyboard: false
    })
    var theWheel = null
    var user = null

    function getEvent() {
        $.ajax({
            url: API_URL + '/prize-event',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data.data.is_active === 0) {
                    Swal.fire({
                        title: 'Thông báo',
                        text: 'Sự kiện đã kết thúc',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                    return
                }
                getGiaiThuong()
            }
        })
    }

    function getGiaiThuong() {
        $.ajax({
            url: API_URL + '/prize-wheel',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (data) {
                $('.lds-spinner').toggleClass('d-none')
                $('.container').toggleClass('d-none')
                responsiveCanvas()
                createWheel(data.data)

            }
        })
    }

    const responsiveCanvas = function () {
        var canvas = document.getElementById("canvas");
        var parent = document.getElementById("canvasCt");
        var width = parent.offsetWidth;
        var height = parent.offsetHeight;
        canvas.style.width = width + "px";
        canvas.style.height = height + "px";
        canvas.width = width;
        canvas.height = height;
    }
    audio = new Audio('./Mp3s/tick.mp3');  // Create audio object and load desired file.
    audioWinning = new Audio('./Mp3s/fanfare-winner.mp3');
    audioFound = new Audio('./Mp3s/foundMa.mp3');
    audioClick = new Audio('./Mp3s/clickingsound.mp3');
    audioCorrect = new Audio('./Mp3s/correct.mp3');
    audioKhongDung = new Audio('./Mp3s/MaKhongDung.mp3');
    audioGameOver = new Audio('./Mp3s/Game_Over.mp3');

    function alertPrize(indicatedSegment) {
        // alert(indicatedSegment)
        isStartSpin = "False";
        console.log(indicatedSegment);
        if (indicatedSegment.isWin == 0) {
            audioGameOver.play();
            Swal.fire({
                title: 'Thông báo',
                text: indicatedSegment.text,
                icon: 'warning',
                confirmButtonText: 'OK'
            })
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success mx-1",
                    cancelButton: "btn btn-danger mx-1"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'Chúc mừng bạn đã trúng thưởng',
                text: 'Bạn đã trúng thưởng ' + indicatedSegment.text,
                icon: 'success',
                // showCancelButton: true,
                confirmButtonText: "OK",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Thành công",
                        text: "Bạn có muốn tiếp tục quay không?",
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonText: "Có",
                        cancelButtonText: "Không",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire({
                                title: "Thông báo",
                                text: "Chúng tôi sẽ liên hệ với bạn để trao giải thưởng",
                                icon: "success"
                            });
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire({
                                title: "Thông báo",
                                text: "Chúng tôi sẽ liên hệ với bạn để trao giải thưởng",
                                icon: "success"
                            });
                        }
                    });
                }
            });
            audioWinning.play();
        }

        user.prize = indicatedSegment.text
        $.ajax({
            url: API_URL + '/prize-wheel',
            type: 'POST',
            dataType: 'json',
            data: user,
            success: function (data) {
                console.log(data)

            }
        })
    }

    function playSound() {
        audio.pause();
        audio.currentTime = 0;
        audio.play();
    }

    function createWheel(segmentsData = []) {
        $('#dvNutTrungTam').html('<img onclick="turnOnModal()" style="width: 130px;" src="https://admin.xspin.vn/Upload/Images/NutQuay_Final.png" />')

        var widthN = 295;
        var innerWidth1 = 62;
        font_s = 15;
        segments = []
        for (var i = 0; i < segmentsData.length; i++) {
            segments.push({
                'fillStyle': segmentsData[i].fill_color,
                'text': segmentsData[i].name,
                'textFillStyle': segmentsData[i].text_color,
                'textFontSize': font_s,
                'strokeStyle': 'white',
                'probability': segmentsData[i].probability,
                'textFontFamily': 'Arial',
                'textFontWeight': 'bold',
                'textAlignment': 'outer',
                'textDirection': 'normal',
                'isWin': segmentsData[i].is_win,
                'size': segmentsData[i].size,
                'startAngle': 0,

            })
        }
        console.log(segments);
        theWheel = new Winwheel({
            'outerRadius': widthN,        // Set outer radius so wheel fits inside the background.
            'innerRadius': innerWidth1,         // Make wheel hollow so segments don't go all way to center.
            'textFontSize': font_s,         // Set default font size for the segments.
            'textOrientation': 'horizontal', // Make text vertial so goes down from the outside of wheel.
            'textAlignment': 'outer',    // Align text to outside of wheel.
            'numSegments': segments.length,         // Specify number of segments.
            'segments': segments,
            'animation':           // Specify the animation to use.
            {
                'type': 'spinToStop',
                'duration': 12,     // Duration in seconds.
                'spins': 5,     // Default number of complete spins.
                'callbackSound': playSound,
                'callbackFinished': alertPrize
            },
            //'drawMode': 'image',
            'lineWidth': 0,
            'responsive': true
        });
    }

    function turnOnModal() {
        modalForm.show()
    }

    function spin() {
        if (isStartSpin === "True") {
            return;
        }
        isStartSpin = "True";
        console.log(isStartSpin)
        theWheel.animation.spins = 5;
        theWheel.rotationAngle = 0;
        theWheel.draw();
        theWheel.startAnimation();
    }

    function showInfo() {
        const number_phone = $('#number_phone').val()
        const full_name = $('#full_name').val()
        const address = $('#address').val()
        const facebook = $('#facebook').val()
        console.log(number_phone, full_name, address, facebook)
        if (number_phone === '' || full_name === '' || address === '' || facebook === '') {
            Swal.fire({
                title: 'Thông báo',
                text: 'Bạn cần nhập đầy đủ thông tin',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
            return
        } else {
            user = {
                phone: number_phone,
                full_name: full_name,
                address: address,
                facebook: facebook
            }
            $('#phone_text').text(user.phone)
            $('#full_name_text').text(user.full_name)
            $('#address_text').text(user.address)
            $('#facebook_text').text(user.facebook)
            modalForm.hide()
            modalDetail.show()
        }
    }

    function startSpin() {
        $.ajax({
            url: API_URL + '/prize-check-user/' + $('#number_phone').val(),
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (data) {
                Swal.fire({
                    title: 'Thông báo',
                    text: 'Số điện thoại đã được sử dụng',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                })
            },
            error: function (data) {
                modalForm.hide()
                modalDetail.hide()
                spin()
            }
        })
    }

    function resetWheel() {
        theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
        theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
        theWheel.draw();                // Call draw to render changes to the wheel.
        wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
    }

}
