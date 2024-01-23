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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style=
    "background-image: url( {{ storage_path($event->setting->background_pc) }});
background-size: cover;
background-repeat: no-repeat;
background-position: center" >
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
            <div id="vqRight" class="mt-5">
                <div id="canvasCt" style="position: relative; ">
                    <div id="quayBtn" class="noSelectedColor" onclick="startSpin()"
                         style="background-position: center; background-size: cover">
                        <img id="idAnhNutQuay"
                             style="width: 100%; position: absolute; top: -5%; left: 0; max-width: 100px; right: 0; margin: auto;"
                             src="https://admin.xspin.vn/upload/images/vqmm_cauhinhmacdinh_avq_10.png?v=712382351517" />
                    </div>
                    <canvas id="canvas" width="620" height="620" data-responsiveMinWidth="180"
                            data-responsiveScaleHeight="true" data-responsiveMargin="50" style="background-image: url('https://vqmm.xspin.vn/Images/13459-vien%20trang.png');
                            background-size: contain; background-repeat: no-repeat; background-position: center">
                        <p style="color: white; text-align: center">Rất
                            tiết, trình duyệt của bạn không hỗ trợ
                            canvas.
                            Hãy thử trình duyệt khác ví dụ như Chrome
                            hoặc Firefox.</p>
                    </canvas>
                    <div id="dvNutTrungTam" style="cursor:pointer; position: absolute; top: 39%; left: 38% "></div>
                    <div id="border_outside"
                         style="background-image: url('https://vqmm.xspin.vn/Images/13459-vien%20trang.png'); background-size: contain;">
                    </div>
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
                <button type="button" class="btn btn-danger m-2" onclick="startSpin()">Quay</button>
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
                    <label for="facebook" class="form-label">Đường dẫn
                        facebook cá nhân</label>
                    <input class="form-control" id="facebook" placeholder="https://facebook.com/quangbaond">
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
                    <button type="button" onclick="showInfo()" class="btn btn-success">Xác nhận</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('Plugins/Wheel/Winwheel.js')}}"></script>
<script src="{{asset('Plugins/TweenMax/TweenMax.js')}}"></script>
<script src="{{asset('js/config.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
</body>

</html>
