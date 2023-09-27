<header class="header ">
    <div class="d-flex justify-content-between align-items-center header-content">
        <!-- Icon toggle menu moblie -->
        <div class="wrapper-icon icon-menu" onclick="toggleSidebar(true)">
            <i class="fa-solid fa-bars"></i>
        </div>
        <!-- End Icon toggle menu moblie -->

        <form class="form-search dropdown">
            <div class="d-flex justify-content-center align-items-center header-search" id="header-search">
                <div class="wrapper-icon icon-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <!-- Input Search -->
                <div class="form-search-input" id="search-input">
                    <input type="text" placeholder="Nhập thông tin tìm kiếm...">
                </div>
                <!-- End Input Search -->

                <div class="wrapper-icon none" id="icon-clear-search" onclick="clearSearch()">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <ul class="result-search none" id="rs-search">
                <div class="result-search-content">
                    <!-- title search -->
                    <div class="result-search-title">
                        <p>Đề xuất cho bạn</p>
                        <button>Xóa</button>
                    </div>

                    <!-- text result search -->
                    <div class="result-search-item d-flex">
                        <div class="wrapper-icon">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                        <span class="ms-3">Chữ mày kiếm đây nè thằng ngu</span>
                    </div>
                    <div class="result-search-item d-flex">
                        <div class="wrapper-icon">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                        <span class="ms-3">Chữ mày kiếm đây nè thằng ngu</span>
                    </div>
                    <!-- End text result search -->


                    <!-- music result search -->
                    <div class="result-search-item d-flex align-items-center justify-content-start ">
                        <div class="avatar me-3">
                            <img src="https://photo-resize-zmp3.zmdcdn.me/w165_r1x1_webp/cover/6/d/9/6/6d961b2a82f151a0f9af7de928e8f809.jpg" alt="">
                        </div>
                        <div class="result-search-item-content d-flex flex-column justify-content-center">
                            <p class="name-song">Tên bài hát</p>
                            <span class="name-artist">Tao hát đc k</span>
                        </div>
                        <div class="result-search-item-actions d-flex gap-3">
                            <!-- icon Like -->
                            <button class="item-actions active">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                            <!-- end icon Like -->

                            <button class="item-actions more dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>
                    <!-- End music result search -->

                </div>
            </ul>
        </form>

        <!-- action header -->
        <div class="header-action" id="myButton">
            <div class="header-action-content">
                <div class="action-content-setting">

                    <!-- setting icon -->
                    <div class="wrapper-icon" id="setting" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-toggle-tooltip="tooltip" data-bs-placement="bottom" title="Cài đặt">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <!-- end setting icon -->

                    <!-- sub menu setting -->
                    <ul class="dropdown-menu sub-menu-setting" aria-labelledby="setting">
                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <div><i class="fa-regular fa-circle-play"></i></div>
                                <span>Trình phát nhạc</span>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <div><i class="fa-solid fa-brush"></i></div>
                                <span>Giao diện</span>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <!-- boder -->
                        <div class="menu-list-action-item no-pointer">
                            <div class="boder-single">
                                <div></div>
                            </div>
                        </div>

                        <div class="menu-list-action-item disabled">
                            <div class="action-item-content">
                                <div><i class="fa-solid fa-circle-info"></i></div>
                                <span>Giới thiệu</span>

                            </div>
                        </div>

                        <div class="menu-list-action-item disabled">
                            <div class="action-item-content">
                                <div><i class="fa-solid fa-phone"></i></div>
                                <span>Liên hệ</span>
                                <div><i class="fa-solid fa-arrow-trend-up"></i></div>
                            </div>
                        </div>

                        <div class="menu-list-action-item disabled">
                            <div class="action-item-content">
                                <div><i class="fa-brands fa-buysellads"></i></div>
                                <span>Quảng cáo</span>
                                <div><i class="fa-solid fa-arrow-trend-up"></i></div>
                            </div>
                        </div>

                        <div class="menu-list-action-item disabled">
                            <div class="action-item-content">
                                <div><i class="fa-regular fa-file-lines"></i></div>
                                <span>Thỏa thuận sử dụng</span>
                                <div><i class="fa-solid fa-arrow-trend-up"></i></div>
                            </div>
                        </div>

                        <div class="menu-list-action-item disabled">
                            <div class="action-item-content">
                                <div><i class="fa-solid fa-shield-halved"></i></div>
                                <span>Chính sách bảo mật</span>
                                <div><i class="fa-solid fa-arrow-trend-up"></i></div>
                            </div>
                        </div>
                    </ul>
                </div>
                <!-- End sub menu setting -->


                <!-- Sub menu profile -->
                <div class="action-content-avatar">
                    <img class="avatar" src="https://s120-ava-talk-zmp3.zmdcdn.me/d/3/e/6/4/120/d952e9ddc5c0f39892340e8d4a2db971.jpg" alt="" id="profile" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <ul class="dropdown-menu sub-menu-setting" id="profile">

                        <!-- Show profile -->
                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <img class="avatar" src="https://s120-ava-talk-zmp3.zmdcdn.me/d/3/e/6/4/120/d952e9ddc5c0f39892340e8d4a2db971.jpg" alt="" id="profile" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <span>Tên tao nè</span>
                            </div>
                        </div>
                        <!-- End Show profile -->

                        <!-- boder -->
                        <div class="menu-list-action-item no-pointer">
                            <div class="boder-single">
                                <div></div>
                            </div>
                        </div>
                        <!-- End boder -->
   
                        <!-- Edit profile -->
                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <i class="fa-solid fa-user-pen"></i>
                                <span>Chỉnh sửa thông tin cá nhân</span>

                            </div>
                        </div>
                        <!-- End Edit profile -->

                        <!-- Logout -->
                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Đăng xuất</span>
                            </div>
                        </div>
                        <!-- End -->


                    </ul>
                </div>
                <!-- End Sub menu profile -->

            </div>
        </div>
        <!-- End action header -->

    </div>
</header>