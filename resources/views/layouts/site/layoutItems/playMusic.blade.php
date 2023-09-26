<div class="wrapper-play-music">
    <div class="play-music-content">
        <div class="play-music-content-info">
            <div class="info-avatar">
                <a href="">
                    <img src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_webp/cover/3/c/3/c/3c3ce33100476bdaab8ffc57e1df6f2e.jpg" alt="">
                </a>
            </div>
            <div class="info-title">
                <a class="run-text " href=""><span class="info-title-name">Những bản Hit V-Pop 'thuộc nằm lòng' của mọi nhà</span></a>
                <a href=""><span class="info-title-artist">Tên tao nè đọc đi m</span></a>
            </div>
            <div class="info-action">

                <button class="item-actions">
                    <i class="fa-regular fa-heart"></i>
                </button>
                <button class="item-actions">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>
        <div class="play-music-player-controls">

        </div>
        <div class="play-music-content-actions">
            <div class="wrapper-icon" id="toggle-play-music-sidebar">
                <i class="fa-regular fa-file-audio"></i>
            </div>
        </div>
    </div>
</div>

<div class="playlist-aside hidden" id="playlist-aside">
    <div class="playlist-aside-wrapper">
        <div class="playlist-aside-header">
            <div class="items-header active">
                <span>Danh sách phát</span>
            </div>
            <div class="items-header">
                <span>Nge gần đây</span>
            </div>
        </div>
        <div class="playlist-aside-content">
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
                        <div class="song-action dropdown">
                            <button class="item-actions">
                                <i class="fa-regular fa-heart"></i>
                            </button>
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- song listened -->
            <div class="item-song listened">
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
                        <div class="song-action dropdown">
                            <button class="item-actions">
                                <i class="fa-regular fa-heart"></i>
                            </button>
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- song active -->
            <div class="item-song active">
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
                        <div class="song-action dropdown">
                            <button class="item-actions">
                                <i class="fa-regular fa-heart"></i>
                            </button>
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
                        </div>
                    </div>
                </div>
                <div class="item-song-footer">
                    <p>Tiếp theo</p>
                </div>
            </div>
        </div>
    </div>

</div>