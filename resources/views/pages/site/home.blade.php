@extends('layouts.site.main')

@section('title', 'Trang chủ')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/home.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listSong.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listAlbum.css') }}">


@stop

@section('content')
<div class="home-page-content">
    <div class="home-page-content-items">
        <div class="list-song-wrapper">
            <div class="main-items-header">
                <div class="items-header-subtitle">
                    <span>Bắt đầu nghe từ một bài hát</span>
                </div>
                <div class="items-header-title">
                    Gợi Ý Từ Nhạc Bạn Đã Nghe
                </div>
            </div>
            <div class="main-items-content">
                <!-- item -->
                <div class="wrapper-items-song dropdown">
                    <!-- song -->
                    <div class="item-song">
                        <div class="item-song-wrapper">
                            <div class="item-song-content">
                                <div class="song-thumb">
                                    <img src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_webp/cover/3/2/a/3/32a35f4d26ee56366397c09953f6c269.jpg" alt="">
                                    <button class="song-thumb-action">
                                        <i class="fa-solid fa-play hidden"></i>
                                        <i class="fa-regular fa-circle-pause fa-spin"></i>
                                    </button>
                                </div>
                                <div class="song-info">
                                    <a class="song-info-name"><span>Tên bài hát</span></a>
                                    <a class="song-info-astist"><span>Tên tao <i class="fa-solid fa-star"></i></span></a>
                                </div>

                            </div>
                        </div>


                    </div>

                    <button class="item-actions" id="id-test" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <!-- more song -->
                    <div class="dropdown-menu song-menu" aria-labelledby="id-test">
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
                    <!-- end more song -->


                    <button class="item-actions">
                        <i class="fa-regular fa-heart"></i>
                    </button>


                </div>
                <!-- End item -->






            </div>
        </div>
    </div>

    <div class="home-page-content-items">
        <div class="list-album-wrapper">
            <div class="main-items-header">
                <div class="items-header-title">
                    Có Thể Bạn Muốn Nghe
                </div>
            </div>
            <div class="main-items-content album">
                <div class="items-content">
                    <div class="wrapper-items-album">
                        <div class="items-album-img">
                            <img src="https://photo-resize-zmp3.zmdcdn.me/w320_r1x1_webp/cover/a/b/7/a/ab7aec69a53caaa0225097e2a4495dcb.jpg" alt="">
                        </div>
                        <button class="item-actions">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <button class="item-actions play">
                            <i class="fa-regular fa-circle-play"></i>
                        </button>
                        <button class="item-actions">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </div>
                    <div class="name-user-album">
                        <a>Tên tao</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-page-content-items">
        <div class="list-artist-wrapper">
            <div class="main-items-header">
                <div class="items-header-title">
                    Nghệ Sĩ Tham Gia
                </div>
            </div>
            <div class="main-items-content artist">
                <div class="artist-item">
                    <div class="wrapper-avatar">
                        <div class="wrapper-avatar-content">

                            <div class="artist-avatar">
                                <img src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_webp/avatars/e/1/e1c904e01896f63fa3511935ae51ca16_1485159033.jpg" alt="">
                            </div>
                            <div class="wrapper-icon">
                                <i class="fa-solid fa-shuffle"></i>
                            </div>
                        </div>

                    </div>

                    <div class="artist-info">
                        <div class="artist-info-name">
                            <a>Hồng Nhung</a>
                        </div>
                        <div class="artist-info-follower">
                            <a>110K quan tâm</a>
                        </div>
                    </div>
                    <div class="artist-action">
                        <button class="artist-action-follow">
                            <div class="wrapper-icon">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <div class="artist-action-title">
                                Quan tâm
                            </div>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@stop