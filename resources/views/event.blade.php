<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        vòng quay may mắn TJC
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
</head>

<body style="background-image: url( 'storage/{{ $event->setting->background_pc }}');
background-size: cover;
background-repeat: no-repeat;">
    <div class="lds-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="container d-none">
        <div class="row">
            <div class="col-12 col-md-6">
                <div id="vqRight" class="mt-5" style="position: relative; ">
                    <div id="canvasCt">
                        <div id="quayBtn" class="noSelectedColor"
                            style="background-position: center; background-size: cover">
                            <img id="idAnhNutQuay"
                                src="https://admin.xspin.vn/upload/images/vqmm_cauhinhmacdinh_avq_10.png?v=712382351517" />
                        </div>
                        <canvas id="canvas" width="500" height="500" style="background-image: url('storage/{{ $event->setting->background_wheel }}');
                            background-size: contain; background-repeat: no-repeat; background-position: center">
                            <p style="color: white; text-align: center">Rất
                                tiết, trình duyệt của bạn không hỗ trợ
                                canvas.
                                Hãy thử trình duyệt khác ví dụ như Chrome
                                hoặc Firefox.</p>
                        </canvas>
                        <div id="dvNutTrungTam">
                            <img id="btn-spin" src="{{ env('APP_URL') }}/storage/{{ $event->setting->background_spin }}"
                                alt="quay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <strong>Danh sách trúng thưởng</strong>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>Tên</th> --}}
                                    <th>Số điện thoại</th>
                                    <th>Giải thưởng</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDetail">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #CF0204; color: white; font-weight: bold">
                    Chúc mừng, Bạn đã nhận được 1 luợt quay.
                </div>
                <div class="modal-body">
                    <p class="border-bottom">Số điện thoại: <span id="phone_text"></span></p>
                    <p class="border-bottom">Họ tên: <span id="full_name_text"></span></p>
                    <p class="border-bottom">Facebook: <span id="facebook_text"></span></p>
                    <p class="border-bottom">Địa chỉ: <span id="address_text"></span></p>
                </div>
                <div class=" d-flex justify-content-end">
                    <button id="startSpin" type="button" class="btn btn-danger m-2">Quay</button>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    Mời bạn nhập thông tin
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="number_phone" class="form-label">Số điện
                            thoại</label>
                        <input type="text" class="form-control" id="number_phone" placeholder="Số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và
                            tên</label>
                        <input class="form-control" id="full_name" placeholder="Họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa
                            chỉ</label>
                        <textarea class="form-control" id="address" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end w-100">
                        <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" id="sendInfo" class="btn btn-success">Xác nhận</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        const segmentsData = {!! json_encode($event->prizes) !!};
        const event = {!! json_encode($event) !!};
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('Plugins/Wheel/Winwheel.js') }}"></script>
    <script src="{{ asset('Plugins/TweenMax/TweenMax.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"
        integrity="sha512-Dz4zO7p6MrF+VcOD6PUbA08hK1rv0hDv/wGuxSUjImaUYxRyK2gLC6eQWVqyDN9IM1X/kUA8zkykJS/gEVOd3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>