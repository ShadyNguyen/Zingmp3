<!DOCTYPE html>
<html lang="vi" data-theme="purple">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <button class="" id="test" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                        nhan day
                    </button>
                    <div class="dropdown-menu song-menu" aria-labelledby="test">
                        <div class="menu-list song-info-menu">
                            <div class="thumb-song">
                                <img src="https://photo-resize-zmp3.zmdcdn.me/w94_r1x1_webp/cover/c/9/5/d/c95d510864924eb7eff43c9b4cb19202.jpg" alt="">
                            </div>
                            <div class="content-song">
                                <p class="content-song-title">Tên tao</p>
                                <div class="content-song-stats">
                                    <div class="stat-item">
                                        <i class="fa-regular fa-heart"></i>
                                        <span>nhìn j</span>
                                    </div>
                                    <div class="stat-item">
                                        <i class="fa-regular fa-heart"></i>
                                        <span>nhìn j</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu-list group-button-menu">
                            <div class="button-menu-item">
                                <i class="fa-solid fa-download"></i>
                                <span>
                                    Tải xuống
                                </span>
                            </div>
                            <div class="button-menu-item">
                                <i class="fa-solid fa-download"></i>
                                <span>
                                    Tải xuống
                                </span>
                            </div>
                            <div class="button-menu-item">
                                <i class="fa-solid fa-download"></i>
                                <span>
                                    Tải xuống
                                </span>
                            </div>
                        </div>

                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <div><i class="fa-brands fa-google-play"></i></div>
                                <span>Thêm vào danh sách phát</span>
                            </div>
                        </div>

                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <div><i class="fa-solid fa-forward"></i></div>
                                <span>Phát tiếp theo</span>
                            </div>
                        </div>

                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <div><i class="fa-solid fa-tower-broadcast"></i></div>
                                <span>Phát Nội dung tương tự</span>
                            </div>
                        </div>


                        <div class="menu-list action ">
                            <div class="menu-list-action-item dropstart">
                                <div class="action-item-content" id="add-play-list" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div><i class="fa-solid fa-circle-plus"></i></div>
                                    <span>Thêm vào playlist</span>
                                    <div class="icon-sub">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </div>
                                </div>
                                <ul class="dropdown-menu sub-menu-song add-play-list" aria-labelledby="add-play-list">
                                    <div class="action-item-content">
                                        <input type="text" placeholder="Tìm playlist">
                                    </div>
                                    <div class="menu-list-action-item mt-3 add-play-list-show">
                                        <div class="action-item-content">
                                            <div class="wrapper-icon add-playlist-i">
                                                <i class="fa-solid fa-plus "></i>
                                            </div>
                                            <span>Tạo playlist mới</span>
                                        </div>
                                    </div>
                                    <div class="menu-list-action-item">
                                        <div class="action-item-content">
                                            <div class="wrapper-icon">
                                                <i class="fa-solid fa-music"></i>
                                            </div>
                                            <span>asdasd</span>
                                        </div>
                                    </div>
                                    <div class="action-item-content empty-content">
                                        <div class="wrapper-icon">
                                            <i class="fa-solid fa-icons"></i>
                                        </div>
                                        <span>Không có playlist</span>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="menu-list-action-item dropstart">
                            <div class="action-item-content">
                                <div><i class="fa-regular fa-copy"></i></div>
                                <span>Sao chép link</span>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- End content -->

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
                            <input type="text" placeholder="Nhập tên playlist">
                        </div>
                        <div class="action-model">
                            <div class="action-model-content">
                                <p>Công khai</p>
                                <span>Mọi người có thể nhìn thấy playlist này</span>
                            </div>
                            <div class="action-model-action">
                                <div class="form-check form-switch swich-model">
                                    <input class="form-check-input" type="checkbox">
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
                    <div class="btn-modal">
                        <button>Tạo mới</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal add playlist -->

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

    </div>

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- End bootstrap JS -->

    <!-- Side JS -->
    <script src="{{ url('public/site/js/site.js') }}"></script>
    <!-- End JS -->

    <!-- Header JS -->
    <script src="{{ url('public/site/js/layouts/header.js') }}"></script>
    <!-- End Header JS -->

    <!-- sidebar JS -->
    <script src="{{ url('public/site/js/layouts/sidebar.js') }}"></script>
    <!-- End sidebar JS -->

    @yield('js')



</body>

</html>