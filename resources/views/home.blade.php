@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

@endsection
@section('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



    <script src="{{ asset('assets/js/home.js') }}"></script>
@endsection
@section('content')
    <div class="md:max-w-screen-md flex-wrap items-center justify-between mx-auto md:my-20 container my-5 ">
        <div class="grid md:grid-cols-2 md:gap-20 gap-5">
            <div class="about_image relative h-[255px] flex justify-center">
                <div class=" md:block hidden absolute top-[-5px] right-[-2px] bg-red-900 w-[149px] h-[149px]">
                </div>
                <div class="md:block hidden absolute bottom-[10px] left-[-3px] bg-red-900 w-[149px] h-[149px]">
                </div>
                <img class=" absolute" src="{{ asset('assets/images/home/about.png') }}" alt="about">
            </div>
            <div class="md:block flex justify-center md:w-full w-[80%] mx-auto">
                <div class="">
                    <h2 class="font-medium text-[#FF0000] text-3xl	my-2">{{ __('home.about_me') }}</h2>
                    <p class="text-xs my-2">{{ __('home.about_title') }}</p>
                    <p class="text-xs my-2">{{ __('home.about_slogan1') }}</p>
                    <p class="text-xs my-2">{{ __('home.about_slogan2') }}</p>
                    <div class="action">
                        <button type="button" class="py-1 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Xem thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:max-w-screen-lg justify-between md:my-20 mx-auto w-[90%]">
        <hr>
        <div class="grid md:grid-cols-3 md:gap-25 gap-5 md:my-20 mx-auto md-5 ">
            <div>
                <img class="w-full" src="{{ asset('assets/images/home/image1.png') }}" alt="">
            </div>
            <div>
                <img class="w-full" src="{{ asset('assets/images/home/image2.png') }}" alt="">
            </div>
            <div>
                <img class="w-full" src="{{ asset('assets/images/home/image3.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="max-w-screen-lg flex-wrap items-center justify-between mx-auto md:my-20 container my-5 ">
        <div class="flex justify-between items-center">
            <h4 class="font-medium text-[#FF0000] text-2xl	my-2">Sản phẩm bán chạy</h4>
            <h3 class="text-gray-700 hover:text-red-500"><a href="">Xem thêm ></a></h3>
        </div>
        <div class="slider_product">
            @for($i = 0; $i <= 10; $i++)
                <div class="block mx-1 w-full bg-white border border-gray-200 shadow ">
                    <div class="product_img flex justify-center">
                        <img  src="{{ asset('assets/images/products/product1.png') }}" alt="">
                    </div>
                    <p class="font-normal text-gray-700 text-sm text-center  px-3">
                        Nhẫn Kim cương Vàng
                        Tangled DDDDC001597
                    </p>
                    <p class="font-normal  text-md text-center mt-5  text-[#C48C46]  px-3">
                        1.00.000đ
                    </p>
                    <p class="font-normal  text-sm text-center my-3 text-gray-700 line-through  px-3">
                        2.00.000đ
                    </p>
                    <div class="actions border-t-1 border-color-gray flex">
                        <button type="button" class="py-1 pr-[0.5rem]  pl-[0.57rem] font-medium text-gray-900 text-sm  bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 ">
                            Tư vấn ngay
                        </button>
                        <button type="button" class="py-1 pr-[0.625rem] pl-[0.650rem] text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="banner ">
        <img class="w-full max-h-[454px]" src="{{ asset('assets/images/banners/banner2.png') }}" alt="banner" srcset="{{ asset('assets/images/banners/banner.png') }}">
    </div>
    <div class="max-w-screen-lg flex-wrap items-center justify-between mx-auto md:my-20 container my-5 ">
        <div class="flex justify-between items-center">
            <h4 class="font-medium text-[#FF0000] text-2xl	my-2">Các sản phẩm mới</h4>
            <h3 class="text-gray-700 hover:text-red-500"><a href="">Xem thêm ></a></h3>
        </div>
        <div class="slider_product">
            @for($i = 0; $i <= 10; $i++)
                <div class="block mx-1 w-full bg-white border border-gray-200 shadow ">
                    <div class="product_img flex justify-center">
                        <img  src="{{ asset('assets/images/products/product1.png') }}" alt="">
                    </div>
                    <p class="font-normal text-gray-700 text-sm text-center  px-3">
                        Nhẫn Kim cương Vàng
                        Tangled DDDDC001597
                    </p>
                    <p class="font-normal  text-md text-center mt-5  text-[#C48C46]  px-3">
                        1.00.000đ
                    </p>
                    <p class="font-normal  text-sm text-center my-3 text-gray-700 line-through  px-3">
                        2.00.000đ
                    </p>
                    <div class="actions border-t-1 border-color-gray flex">
                        <button type="button" class="py-1 pr-[0.5rem]  pl-[0.57rem] font-medium text-gray-900 text-sm  bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 ">
                            Tư vấn ngay
                        </button>
                        <button type="button" class="py-1 pr-[0.625rem] pl-[0.650rem] text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="w-full relative">
        <div class="bg-[#F8F3EF] w-full h-[220px] absolute bottom-0 z-1"></div>

        <div class="md:max-w-screen-md  flex-wrap items-center justify-between mx-auto md:my-20 container my-5  ">
            <div class="grid md:grid-cols-2 md:gap-20 gap-5 md:w-full w-[90%] mx-auto">
                <div class="new_image max-h-[446px] flex justify-center">
                    <img class="" src="{{ asset('assets/images/home/new.png') }}" alt="about">
                </div>
                <div class="md:block  w-[90%] mx-auto new_image">
                    <div class="">
                        <img class="" src="{{ asset('assets/images/home/new_art.png') }}" alt="new_art">
                        <p class="my-3 font-medium text-1xl">Thấu hiểu và tạo tác nên những món trang sức lý tưởng cho Quý khách hàng</p>
                        <img class="w-full md:w-auto" src="{{ asset('assets/images/home/new2.png') }}" alt="new_art">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-screen-lg flex-wrap items-center justify-between mx-auto md:my-20 container my-5 ">
        <div class="flex justify-between items-center">
            <h4 class="font-medium text-[#FF0000] text-2xl	my-2">Có thể bạn sẽ thích</h4>
            <h3 class="text-gray-700 hover:text-red-500"><a href="">Xem thêm ></a></h3>
        </div>
        <div class="slider_product">
            @for($i = 0; $i <= 10; $i++)
                <div class="block mx-1 w-full bg-white border border-gray-200 shadow ">
                    <div class="product_img flex justify-center">
                        <img  src="{{ asset('assets/images/products/product1.png') }}" alt="">
                    </div>
                    <p class="font-normal text-gray-700 text-sm text-center  px-3">
                        Nhẫn Kim cương Vàng
                        Tangled DDDDC001597
                    </p>
                    <p class="font-normal  text-md text-center mt-5  text-[#C48C46]  px-3">
                        1.00.000đ
                    </p>
                    <p class="font-normal  text-sm text-center my-3 text-gray-700 line-through  px-3">
                        2.00.000đ
                    </p>
                    <div class="actions border-t-1 border-color-gray flex">
                        <button type="button" class="py-1 pr-[0.5rem]  pl-[0.57rem] font-medium text-gray-900 text-sm  bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 ">
                            Tư vấn ngay
                        </button>
                        <button type="button" class="py-1 pr-[0.625rem] pl-[0.650rem] text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-red-700">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="banner ">
        <img class="w-full max-h-[454px]" src="{{ asset('assets/images/banners/banner2.png') }}" alt="banner" srcset="{{ asset('assets/images/banners/banner.png') }}">
    </div>

    <div class="md:max-w-screen-lg flex-wrap items-center justify-between mx-auto md:my-20 container my-5 ">
        <div class="grid md:grid-cols-4 md:gap-20 gap-5">
            <div class="">
                <div class="flex flex-column justify-center">
                    <img class="h-[69px]" src="{{ asset('assets/images/home/tragop.png') }}" alt="">
                </div>
                <p class="font-medium text-red-500 text-center my-5">TRẢ GÓP LÃI SUẤT 0%</p>
                <p class="text-center">
                    Áp dụng dễ dàng qua
                    thẻ tín dụng của hơn
                    20 ngân hàng
                </p>
            </div>
            <div class="">
                <div class="flex flex-column justify-center">
                    <img class="h-[69px]" src="{{ asset('assets/images/home/giaohang.png') }}" alt="">
                </div>
                <p class="font-medium text-red-500 text-center my-5">GIAO HÀNG NHANH</p>
                <p class="text-center">
                    Sở hữu ngay món
                    trang sức yêu thích
                    chỉ trong vòng 4 giờ
                </p>
            </div>
            <div class="">
                <div class="flex flex-column justify-center">
                    <img class="h-[69px] w-[93px]" src="{{ asset('assets/images/home/quatang.png') }}" alt="">
                </div>
                <p class="font-medium text-red-500 text-center my-5">QUÀ TẶNG GIÁ TRỊ
                </p>
                <p class="text-center">
                    Những Voucher và
                    Ưu đãi ngập tràn dành
                    cho Quý Khách hàng
                </p>
            </div>
            <div class="">
                <div class="flex flex-column justify-center">
                    <img class="h-[69px] " src="{{ asset('assets/images/home/uudai.png') }}" alt="">
                </div>
                <p class="font-medium text-red-500 text-center my-5">ƯU ĐÃI MUA ONLINE

                </p>
                <p class="text-center">
                    Đặt online – nhận ưu
                    đãi tại showroom
                </p>
            </div>
        </div>
    </div>
    <div class="md:max-w-screen-lg mx-auto md:my-20 container my-5 ">
        <hr>
        <div class="md:grid md:grid-cols-5 md:gap-5 gap-5 my-5">
            <div class="col-span-3">
                <div class="md:grid md:grid-cols-5 md:gap-5 gap-5 my-5 ">
                    <div class="md:col-span-2">
                        <h3 class="font-medium text-[#DB1024] text-3xl my-5 md:text-left text-center">Tin tức</h3>
                        <div class="relative">
                            <img class=" w-full" src="{{ asset('assets/images/home/image_17.png') }}" alt="">
                            <span class="text-sm absolute top-[-20px] right-0 bg-[#ccc] px-[5px]">Tin nổi bật</span>
                        </div>
                    </div>
                    <div class="md:col-span-3">
                        <div class="md:block hidden">
                            <h3 class="text-gray-700 hover:text-red-500 my-5"><a href="">Xem thêm ></a></h3>
                            <h2 class="font-medium my-2">Điểm thêm các phụ kiện STYLE by TJC này, outfit của bạn sẽ thêm nổi bật ở mọi bữa tiệc.</h2>
                            <p>Để bản thân không bị lu mờ trong những buổi tiệc, ngoài trang phục hợp gu, bạn đừng quên sử dụng thêm phụ kiện thật “style” để tăng điểm ấn tượng.</p>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-5 gap-5 my-5 ">
                    <div>
                        <img class="w-full" src="{{ asset('assets/images/home/image_14.png') }}" alt="">
                        <h2 class="font-medium my-2 text-sm md:text-left text-center">Bộ trang sức cưới vàng 18k gồm những gì? Cần lưu ý những gì khi mua? </h2>
                        <p class="text-gray-300 md:text-left text-center">01/09/2023.</p>
                    </div>
                    <div>
                        <div>
                            <img class="w-full" src="{{ asset('assets/images/home/image_15.png') }}" alt="">
                            <h2 class="font-medium my-2 text-sm md:text-left text-center">Bộ trang sức cưới vàng 18k gồm những gì? Cần lưu ý những gì khi mua? </h2>
                            <p class="text-gray-300 md:text-left text-center">01/09/2023.</p>
                        </div>
                    </div>
                    <div>
                        <div>
                            <img class="w-full" src="{{ asset('assets/images/home/image_16.png') }}" alt="">
                            <h2 class="font-medium my-2 text-sm md:text-left text-center">Bộ trang sức cưới vàng 18k gồm những gì? Cần lưu ý những gì khi mua? </h2>
                            <p class="text-gray-300 md:text-left text-center">01/09/2023.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="md:grid md:grid-cols-5 md:gap-5 gap-5 my-5 ">
                    <div class="md:col-span-5">
                        <h3 class="font-medium text-[#DB1024] text-3xl my-5  md:text-left text-center">Video</h3>
                        <div >
                            <iframe width="100%"  src="https://www.youtube.com/embed/8gVFW24ampc?si=BSkaxr8owKB1M1Kz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-5 gap-5 my-5">
                            <div>
                                <iframe width="100%"  class="md:max-h-[100px]" src="https://www.youtube.com/embed/8gVFW24ampc?si=BSkaxr8owKB1M1Kz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div>
                                <p class="font-medium my-2 text-sm md:text-left text-center">Bộ trang sức cưới vàng 18k gồm những gì? Cần lưu ý những gì khi mua? 4</p>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-5 gap-5 my-5">
                            <div >
                                <iframe width="100%" class="md:max-h-[100px]"  src="https://www.youtube.com/embed/8gVFW24ampc?si=BSkaxr8owKB1M1Kz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div>
                                <p class="font-medium my-2 text-sm md:text-left text-center">Bộ trang sức cưới vàng 18k gồm những gì? Cần lưu ý những gì khi mua? 4</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
