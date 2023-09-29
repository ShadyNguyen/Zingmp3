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
                    <div class="wrapper-icon" id="setting" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        <i class="fa-solid fa-gear" data-bs-toggle-tooltip="tooltip" data-bs-placement="bottom" title="Cài đặt"></i>
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
                    @auth('user')
                    <img class="avatar" src="https://s120-ava-talk-zmp3.zmdcdn.me/d/3/e/6/4/120/d952e9ddc5c0f39892340e8d4a2db971.jpg" alt="" id="profile" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">

                    <ul class="dropdown-menu sub-menu-setting" id="profile">

                        <!-- Show profile -->
                        <div class="menu-list-action-item">
                            <div class="action-item-content">
                                <img class="avatar" src="https://s120-ava-talk-zmp3.zmdcdn.me/d/3/e/6/4/120/d952e9ddc5c0f39892340e8d4a2db971.jpg" alt="" id="profile" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <span>{{ Auth::guard('user')->user()->name }}</span>
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
                        <a class="menu-list-action-item">
                            <div class="action-item-content">
                                <i class="fa-solid fa-user-pen"></i>
                                <span>Chỉnh sửa thông tin cá nhân</span>

                            </div>
                        </a>
                        <!-- End Edit profile -->

                        <!-- Logout -->
                        <a href="{{ route('site.auth.logout') }}" class="menu-list-action-item">
                            <div class="action-item-content">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Đăng xuất</span>
                            </div>
                        </a>
                        <!-- End -->


                    </ul>
                    @else

                    <div class="menu-list-action-item">
                        <div class="action-item-content" data-bs-toggle="modal" data-bs-target="#login-model">
                            <span>Đăng nhập</span>
                        </div>
                    </div>
                    @endauth

                    @auth('user')
                    
                    @endauth
                </div>
                <!-- End Sub menu profile -->

            </div>
        </div>
        <!-- End action header -->

    </div>
</header>

@unless(auth('user')->check())
<div class="modal fade" id="login-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login">

            <div class="form-container" id="login-form">
                <p class="title">Đăng nhập</p>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <div class="none" id="warrper-alert-login">
                    <div class="alert alert-danger d-flex align-items-center none" role="alert" id="alert-login">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            An example danger alert with an icon
                        </div>
                    </div>
                </div>
                <form class="form">
                    <div class="input-group">
                        <label for="username-login">Tài khoản</label>
                        <input type="text" name="username" id="username-login" placeholder="" autocomplete="off">
                    </div>
                    <div class="input-group pass">
                        <label for="password-login">Mật khẩu</label>
                        <div class="input-group-pass">

                            <input type="password" name="password" id="password-login" placeholder="" autocomplete="off"> 
                            <div class="wrapper-icon icon-toogle-pass" data-show="password-login" onclick="toggleShowPassword('password-login')">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="forgot">
                        <a rel="noopener noreferrer" href="#">Quên mật khẩu ?</a>
                    </div>
                    <button class="sign" id="btn-login-click">Đăng nhập</button>
                </form>
                <div class="social-message">
                    <div class="line"></div>
                    <p class="message">Đăng nhập với</p>
                    <div class="line"></div>
                </div>
                <div class="social-icons">
                    <button aria-label="Log in with Google" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M16.318 13.714v5.484h9.078c-0.37 2.354-2.745 6.901-9.078 6.901-5.458 0-9.917-4.521-9.917-10.099s4.458-10.099 9.917-10.099c3.109 0 5.193 1.318 6.38 2.464l4.339-4.182c-2.786-2.599-6.396-4.182-10.719-4.182-8.844 0-16 7.151-16 16s7.156 16 16 16c9.234 0 15.365-6.49 15.365-15.635 0-1.052-0.115-1.854-0.255-2.651z">
                            </path>
                        </svg>
                    </button>
                    <button aria-label="Log in with Twitter" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M31.937 6.093c-1.177 0.516-2.437 0.871-3.765 1.032 1.355-0.813 2.391-2.099 2.885-3.631-1.271 0.74-2.677 1.276-4.172 1.579-1.192-1.276-2.896-2.079-4.787-2.079-3.625 0-6.563 2.937-6.563 6.557 0 0.521 0.063 1.021 0.172 1.495-5.453-0.255-10.287-2.875-13.52-6.833-0.568 0.964-0.891 2.084-0.891 3.303 0 2.281 1.161 4.281 2.916 5.457-1.073-0.031-2.083-0.328-2.968-0.817v0.079c0 3.181 2.26 5.833 5.26 6.437-0.547 0.145-1.131 0.229-1.724 0.229-0.421 0-0.823-0.041-1.224-0.115 0.844 2.604 3.26 4.5 6.14 4.557-2.239 1.755-5.077 2.801-8.135 2.801-0.521 0-1.041-0.025-1.563-0.088 2.917 1.86 6.36 2.948 10.079 2.948 12.067 0 18.661-9.995 18.661-18.651 0-0.276 0-0.557-0.021-0.839 1.287-0.917 2.401-2.079 3.281-3.396z">
                            </path>
                        </svg>
                    </button>
                    <button aria-label="Log in with GitHub" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z">
                            </path>
                        </svg>
                    </button>
                </div>
                <p class="signup">Bạn chưa có tài khoản?
                    <a rel="noopener noreferrer" id="btn-swicth-register" href="#" class="">Đăng kí</a>
                </p>
            </div>

            <div class="form-container none" id="register-from">
                <p class="title">Đăng Kí</p>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <div class="none" id="warrper-alert-login">
                    <div class="alert alert-danger d-flex align-items-center none" role="alert" id="alert-login">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            An example danger alert with an icon
                        </div>
                    </div>
                </div>
                <form class="form">
                    <div class="input-group">
                        <label for="username-register">Tài khoản</label>
                        <input type="text" name="username" id="username-register" placeholder="" autocomplete="off">
                    </div>
                    <div class="input-group">
                        <label for="username-register">Tên</label>
                        <input type="text" name="name" id="name-register" placeholder="" autocomplete="off">
                    </div>
                    <div class="input-group pass">
                        <label for="password-login">Mật khẩu</label>
                        <div class="input-group-pass">

                            <input type="password" name="new-password" id="new-password" placeholder="" autocomplete="off">
                            <div class="wrapper-icon icon-toogle-pass" data-show="new-password" onclick="toggleShowPassword('new-password')">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group pass">
                        <label for="password-login">Nhập lại mật khẩu</label>
                        <div class="input-group-pass">

                            <input type="password" name="confirm-new-password" id="confirm-new-password" placeholder="" autocomplete="off">
                            <div class="wrapper-icon icon-toogle-pass" data-show="confirm-new-password" onclick="toggleShowPassword('confirm-new-password')">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="forgot">
                        <!-- <a rel="noopener noreferrer" href="#">Quên mật khẩu ?</a> -->
                    </div>
                    <button class="sign" id="btn-register-click">Đăng kí</button>
                </form>
                <div class="social-message">
                    <div class="line"></div>
                    <p class="message">Đăng kí bằng</p>
                    <div class="line"></div>
                </div>
                <div class="social-icons">
                    <button aria-label="Log in with Google" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M16.318 13.714v5.484h9.078c-0.37 2.354-2.745 6.901-9.078 6.901-5.458 0-9.917-4.521-9.917-10.099s4.458-10.099 9.917-10.099c3.109 0 5.193 1.318 6.38 2.464l4.339-4.182c-2.786-2.599-6.396-4.182-10.719-4.182-8.844 0-16 7.151-16 16s7.156 16 16 16c9.234 0 15.365-6.49 15.365-15.635 0-1.052-0.115-1.854-0.255-2.651z">
                            </path>
                        </svg>
                    </button>
                    <button aria-label="Log in with Twitter" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M31.937 6.093c-1.177 0.516-2.437 0.871-3.765 1.032 1.355-0.813 2.391-2.099 2.885-3.631-1.271 0.74-2.677 1.276-4.172 1.579-1.192-1.276-2.896-2.079-4.787-2.079-3.625 0-6.563 2.937-6.563 6.557 0 0.521 0.063 1.021 0.172 1.495-5.453-0.255-10.287-2.875-13.52-6.833-0.568 0.964-0.891 2.084-0.891 3.303 0 2.281 1.161 4.281 2.916 5.457-1.073-0.031-2.083-0.328-2.968-0.817v0.079c0 3.181 2.26 5.833 5.26 6.437-0.547 0.145-1.131 0.229-1.724 0.229-0.421 0-0.823-0.041-1.224-0.115 0.844 2.604 3.26 4.5 6.14 4.557-2.239 1.755-5.077 2.801-8.135 2.801-0.521 0-1.041-0.025-1.563-0.088 2.917 1.86 6.36 2.948 10.079 2.948 12.067 0 18.661-9.995 18.661-18.651 0-0.276 0-0.557-0.021-0.839 1.287-0.917 2.401-2.079 3.281-3.396z">
                            </path>
                        </svg>
                    </button>
                    <button aria-label="Log in with GitHub" class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z">
                            </path>
                        </svg>
                    </button>
                </div>
                <p class="signup">Bạn đã có tài khoản?
                    <a rel="noopener noreferrer" id="btn-swicth-login" href="#" class="">Đăng nhập</a>
                </p>
            </div>

        </div>
    </div>
</div>
@endunless

<form action="">
    @csrf
</form>

