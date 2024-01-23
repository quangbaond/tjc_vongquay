window.onload = function () {
    blockDevTools()
    var datatable = $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        lengthMenu: [
            [5, 10, 25, 50, 100, 200, 500, 1000, -1],
            [5, 10, 25, 50, 100, 200, 500, 1000, "Tất cả"]
        ],

        language: {
            "decimal": "",
            "emptyTable": "Không có dữ liệu",
            "info": "Hiển thị từ _START_ đến _END_ trong _TOTAL_ kết quả",
            "infoEmpty": "Hiển thị 0 đến 0 trong 0 kết quả",
            "infoFiltered": "(Lọc từ _MAX_ kết quả)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Hiển thị _MENU_ kết quả",
            "loadingRecords": "Đang tải...",
            "processing": "Đang xử lý...",
            "search": "Tìm kiếm:",
            "zeroRecords": "Không tìm thấy kết quả",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Sau",
                "previous": "Trước"
            },
            "aria": {
                "sortAscending": ": Sắp xếp tăng dần",
                "sortDescending": ": Sắp xếp giảm dần"
            }
        },

        ajax: {
            url: API_URL + '/prize-user',
            type: 'GET',
            dataType: 'json',
            dataSrc: 'data',
            data: {
                event_id: event.id
            }
        },
        pageLength: 5,
        searching: true,

        columns: [
            {
                data: 'phone',
                render: function (data, type, row, meta) {
                    return limitNumberPhone(data)
                }
            },
            { data: 'prize' },
            {
                data: 'created_at',
                render: function (data, type, row, meta) {
                    return moment(data).format('DD-MM-YYYY HH:mm:ss')
                }
            },
        ],

        // columns: [
        //     { data: 'phone' },
        //     { data: 'address' },
        //     { data: 'prize' },
        //     { data: 'created_at' },
        // ],
    })
    function limitNumberPhone(phone) {
        return phone.slice(0, 6) + '****'
    }
    setTimeout(() => {
        $('.lds-spinner').toggleClass('d-none')
        $('.container').toggleClass('d-none')

        createWheel(segmentsData)
    }, 1000);

    let isStartSpin = "False";

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

    audio = new Audio('/Mp3s/tick.mp3');  // Create audio object and load desired file.
    audioWinning = new Audio('/Mp3s/fanfare-winner.mp3');
    audioFound = new Audio('/Mp3s/foundMa.mp3');
    audioClick = new Audio('/Mp3s/clickingsound.mp3');
    audioCorrect = new Audio('/Mp3s/correct.mp3');
    audioKhongDung = new Audio('/Mp3s/MaKhongDung.mp3');
    audioGameOver = new Audio('/Mp3s/Game_Over.mp3');

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
        user.event_id = event.id
        $.ajax({
            url: API_URL + '/prize-wheel',
            type: 'POST',
            dataType: 'json',
            data: user,
            success: function (data) {
                console.log(data)
                datatable.ajax.reload()
            }
        })

        // load data table

    }

    function playSound() {
        audio.pause();
        audio.currentTime = 0;
        audio.play();
    }

    function createWheel(segmentsData = []) {

        var widthN = 235;
        var innerWidth1 = 42;
        font_s = 13;
        // responsive

        segments = []
        for (var i = 0; i < segmentsData.length; i++) {
            if (segmentsData[i].name.length > 20) {
                segmentsData[i].name = segmentsData[i].name.slice(0, 20) + '\n' + segmentsData[i].name.slice(20)
            }
            segments.push({	// The size of the wheel.
                'fillStyle': segmentsData[i].fill_color,
                'text': segmentsData[i].name,
                'textFillStyle': segmentsData[i].text_color,
                'textFontSize': segmentsData[i].name.length < 30 ? font_s : 13,
                'strokeStyle': '#ccc',
                'probability': segmentsData[i].probability,
                'textFontFamily': 'Arial',
                'textFontWeight': 'bold',
                'textAlignment': 'outer',
                'wrapText': true,
                // wrap text
                'textMargin': 0,
                'textOrientation': 'horizontal',

                'textBaseline': 'middle',
                'textDirection': 'normal',
                'isWin': segmentsData[i].is_win,
                'size': segmentsData[i].size,
                'soundTrigger': 'pin',
                'startAngle': 0,

            })
        }

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
            'drawMode': 'code',
            'lineWidth': 0,
            'responsive': true
        });
    }

    function turnOnModal() {
        modalForm.show()
    }

    $('#btn-spin').click(() => {
        turnOnModal()
    })

    function spin() {
        if (isStartSpin === "True") {
            return;
        }
        isStartSpin = "True";
        theWheel.animation.spins = 5;
        theWheel.rotationAngle = 0;
        calculateProbability()

        theWheel.draw();
        theWheel.startAnimation();
    }

    // Tính toán xác suất trúng thưởng
    function calculateProbability() {
        var segments = theWheel.segments;
        console.log(segments);
        var total = 0;
        for (var i = 0; i < segments.length; i++) {
            if (segments[i]) {
                total += segments[i].probability;
            }
        }
        var stopAt = Math.random() * total;
        var current = 0;
        for (var i = 0; i < segments.length; i++) {
            if (!segments[i]) {
                continue;
            }
            current += segments[i].probability;
            if (current > stopAt) {
                theWheel.animation.stopAngle = theWheel.getRandomForSegment(i);
                break;
            }
        }
    }

    function showInfo() {
        const number_phone = $('#number_phone').val()
        const full_name = $('#full_name').val()
        const address = $('#address').val()
        if (number_phone === '' || full_name === '' || address === '') {
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
            }
            $('#phone_text').text(user.phone)
            $('#full_name_text').text(user.full_name)
            $('#address_text').text(user.address)
            modalForm.hide()
            modalDetail.show()
        }
    }

    $('#sendInfo').click(() => {
        showInfo()
    })

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

    $('#startSpin').click(() => {
        startSpin()
    })

    function resetWheel() {
        theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
        theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
        theWheel.draw();                // Call draw to render changes to the wheel.
        wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
    }

}
