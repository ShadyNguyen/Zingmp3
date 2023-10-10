<!DOCTYPE html>
<html lang="vi" data-theme="">

<head>
    <meta charset="UTF-8">
    <meta name="root-url" data-index="{{ URL::to('/'); }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('public/site/img/logo-laravel-zingmp3.png') }}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- End bootstrap -->

    <!-- Font awesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End Font awesom -->

    <!-- Theme -->
    <link rel="stylesheet" href="{{ url('public/site/css/themes/themes.css') }}">
    <!-- End Them -->

    <!-- Main -->
    <link rel="stylesheet" href="{{ url('public/site/css/site.css') }}">
    <!-- End Main -->

    <!-- Header -->
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/header.css') }}">
    <!-- End Header -->

    <!-- sidebar -->
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/sidebar.css') }}">
    <!-- End sidebar -->

    <!-- playMusic -->
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/playMusic.css') }}">
    <!-- End playMusic -->

    <!-- playListAside -->
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/playListAside.css') }}">
    <!-- End playListAside -->


    <title>@yield('title') - Toanf-messi</title>

    @yield('css')
</head>

<body>
    <script>
        function replaceEmptyImage(img){

    img.src = "https://photo-resize-zmp3.zmdcdn.me/w320_r1x1_jpeg/cover/6/0/5/8/6058a7cec305e63abbf7f27819f0552e.jpg";
    }
    </script>
    <!-- overlay -->
    <div class="bg-overlay">
    </div>
    <!-- End overlay -->



    <div class="wrapper">
        <!-- header -->
        @include('layouts/site/layoutItems/header')
        <!-- End header -->


        <!-- sidebar -->
        @include('layouts/site/layoutItems/sidebar')
        <!-- End sidebar -->

        <!-- Content -->
        <div class="content-wrapper">
            <div class="content">

                <div class="dropdown">

                    <!-- Button trigger modal -->
                    
                    @yield('content')

                </div>
            </div>
        </div>
        <!-- End content -->
        @auth('user')
        
        <!-- Modal add playlist -->
        <div class="modal fade modal-add-playlist" id="modal-add-play-list" tabindex="-1" aria-labelledby="modal-add-play-list" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class=" modal-wrapper">
                        <div class="header-model d-flex">
                            <h3>
                                Tạo playlist mới
                            </h3>
                            <div class="wrapper-icon" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </div>
                        <div class="action-item-content">
                            <input type="text" placeholder="Nhập tên playlist" id="name-new-playlist" autocomplete="off">
                        </div>
                        <div class="action-model">
                            <div class="action-model-content">
                                <p>Công khai</p>
                                <span>Mọi người có thể nhìn thấy playlist này</span>
                            </div>
                            <div class="action-model-action">
                                <div class="form-check form-switch swich-model">
                                    <input class="form-check-input" type="checkbox" name="check-status-new-playlist">
                                </div>
                            </div>
                        </div>
                        <div class="action-model">
                            <div class="action-model-content">
                                <p>Phát ngẫu nhiên</p>
                                <span>Luôn phát ngẫu nhiên các bài hát</span>
                            </div>
                            <div class="action-model-action">
                                <div class="form-check form-switch swich-model">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-modal" id="btn-add-play-list">
                        <button>Tạo mới</button>
                    </div>
                    @auth('user')
                    <input type="hidden" value="{{ Auth::guard('user')->user()->id }}">
                    @endauth
                </div>
            </div>
        </div>
        <!-- End Modal add playlist -->

        

        @endauth

        <!-- Modal change theme -->
        <div class="modal fade modal-add-playlist" id="modal-add-change-theme" tabindex="-1" aria-labelledby="modal-add-change-theme" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content change-theme">
                    <div class=" modal-wrapper">
                        <div class="header-model d-flex">
                            <h3>
                                Giao diện
                            </h3>
                            <div class="wrapper-icon" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </div>
                        <div class="modal-change-theme-content">
                            <h2>Chọn màu</h2>
                            <div class="list-theme" id="list-theme">

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>
        <!-- End Modal change theme -->

        @auth('user')
        <!-- Modal submit delete play list -->
        <div class="modal fade modal-add-playlist" id="modal-submit-delete-playlist" tabindex="-1" aria-labelledby="modal-submit-delete-playlist" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content confirm">
                    <div class=" modal-wrapper">
                        <div class="header-model d-flex">

                            <div class="wrapper-icon" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </div>
                        <div class="">
                            <h2>Xóa playlist</h2>
                            <div class="list-theme" id="list-theme">
                                <span>Playlist của bạn sẽ bị xóa khỏi thư viện cá nhân. Bạn có muốn xóa?</span>
                            </div>
                        </div>
                        
                        <div class="action-modal-cofirm">
                            <button class="outline-button active" data-bs-dismiss="modal" aria-label="Close">
                                <span>Không</span>
                            </button>
                            <button class="outline-button" id="btn-submit-delete-playlist" >
                                <span>Có</span>
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal submit delete play list -->
        @endauth


        <!-- playMusic -->
        @include('layouts/site/layoutItems/playMusic')
        <!-- End playMusic -->

        <!-- playListAside -->
        @include('layouts/site/layoutItems/playListAside')
        <!-- End playListAside -->

        <!-- alert -->
        
        <div class="notification d-flex justify-content-center align-items-center hidden" id="notification">
            <p>Đã thêm <strong>Toanf</strong> vào danh sách phát</p>
            <div class="icon-notification wrapper-icon justify-content-between"><i class="fa-solid fa-xmark " onclick="closeNotification('notification')"></i></div>
        </div>
        <!-- End Alert -->

        <audio id="elm-audio" controls hidden>
            <source src="" type="audio/mpeg">
            <!-- Your browser does not support the audio element. -->
        </audio>


    </div>

    <!-- theme login JS -->
    <script src="{{ url('public/site/js/layouts/changeThem.js') }}"></script>
    <!-- End theme login JS -->

    <!-- axios JS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- End axios JS -->

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- End bootstrap JS -->

    <!-- Side JS -->
    <script src="{{ url('public/site/js/site.js') }}"></script>
    <!-- End JS -->

    <!-- Header JS -->
    <script src="{{ url('public/site/js/layouts/header.js') }}"></script>
    <!-- End Header JS -->

    @unless(auth('user')->check())
    <!-- Form login JS -->
    <script src="{{ url('public/site/js/layouts/login.js') }}"></script>
    <!-- End Form login JS -->
    @endunless


    @auth('user')
    <!-- like song JS -->
    <script src="{{ url('public/site/js/likeSong.js') }}"></script>
    <!-- End like song JS -->

    <!-- follow artist JS -->
    <script src="{{ url('public/site/js/followArtist.js') }}"></script>
    <!-- End follow artist JS -->

    <!-- add playlist JS -->
    <script src="{{ url('public/site/js/addPlayList.js') }}"></script>
    <!-- End add playlist JS -->

    @endauth

    <!-- Play music JS -->
    <script src="{{ url('public/site/js/playMusic.js') }}"></script>
    <!-- End Play music JS -->

    <!-- Arlert login JS -->
    <script src="{{ url('public/site/js/alert.js') }}"></script>
    <!-- End Arlert login JS -->

    <!-- sidebar JS -->
    <script src="{{ url('public/site/js/layouts/sidebar.js') }}"></script>
    <!-- End sidebar JS -->

    @yield('js')

</body>

</html>