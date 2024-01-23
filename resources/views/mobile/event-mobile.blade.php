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
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
</head>

<body style="background-image: url( 'storage/{{ $event->setting->background_mobile }}');
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
            @if($event->setting->rule_title)
            <div class="col-12 col-md-12 mt-5">
                {{-- icon help --}}
                <div class="d-flex justify-content-end">
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">

                        <svg height="40px" id="Capa_1" style="enable-background:new 0 0 91.999 92;" version="1.1"
                            viewBox="0 0 91.999 92" width="40px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M45.385,0.004C19.982,0.344-0.334,21.215,0.004,46.619c0.34,25.393,21.209,45.715,46.611,45.377  c25.398-0.342,45.718-21.213,45.38-46.615C91.655,19.986,70.785-0.335,45.385,0.004z M45.249,74l-0.254-0.004  c-3.912-0.116-6.67-2.998-6.559-6.852c0.109-3.788,2.934-6.538,6.717-6.538l0.227,0.004c4.021,0.119,6.748,2.972,6.635,6.937  C51.903,71.346,49.122,74,45.249,74z M61.704,41.341c-0.92,1.307-2.943,2.93-5.492,4.916l-2.807,1.938  c-1.541,1.198-2.471,2.325-2.82,3.434c-0.275,0.873-0.41,1.104-0.434,2.88l-0.004,0.451H39.429l0.031-0.907  c0.131-3.728,0.223-5.921,1.768-7.733c2.424-2.846,7.771-6.289,7.998-6.435c0.766-0.577,1.412-1.234,1.893-1.936  c1.125-1.551,1.623-2.772,1.623-3.972c0-1.665-0.494-3.205-1.471-4.576c-0.939-1.323-2.723-1.993-5.303-1.993  c-2.559,0-4.311,0.812-5.359,2.478c-1.078,1.713-1.623,3.512-1.623,5.35v0.457H27.935l0.02-0.477  c0.285-6.769,2.701-11.643,7.178-14.487C37.946,18.918,41.446,18,45.53,18c5.346,0,9.859,1.299,13.412,3.861  c3.6,2.596,5.426,6.484,5.426,11.556C64.368,36.254,63.472,38.919,61.704,41.341z" />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                            <g />
                        </svg>
                    </button>
                </div>
                <div class="collapse mt-3" id="collapseExample">
                    <div class="card card-body">
                        {!! $event->setting->rule_title !!}
                    </div>
                </div>
            </div>
            @endif

            <div class="col-12 col-md-12 col-lg-6 d-flex justify-content-center">
                <div id="vqRight" class="mt-5" style="position: relative; ">
                    <div id="canvasCt">
                        <div id="quayBtn" class="noSelectedColor"
                            style="background-position: center; background-size: cover">
                            <img id="idAnhNutQuay"
                                src="https://admin.xspin.vn/upload/images/vqmm_cauhinhmacdinh_avq_10.png?v=712382351517" />
                        </div>
                        <canvas id="canvas" width="300" height="300" style="background-image: url('storage/{{ $event->setting->background_wheel }}');
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
            <div class="col-12 col-md-12 col-lg-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <strong>Danh sách trúng thưởng</strong>
                    </div>
                    <div class="card-body">
                        {{-- <table id="dataTable" class="table table-striped border table-bordered dataTable"
                            style=" width:100%">
                            <thead>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <th>Giải thưởng</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> --}}

                        <table id="dataTable" class="table table-striped border table-bordered dataTable"
                            style=" width:100%">
                            <thead>
                                <tr>
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
    <script src="{{ asset('js/js_mobile.js') }}"></script>
</body>

</html>