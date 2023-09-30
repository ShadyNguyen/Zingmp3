<div class="wrapper-play-music">
    <div class="play-music-content">
        <div class="play-music-content-info">

            <!-- Img Song -->
            <div class="info-avatar" >
                <a href="">
                    <img id="play-music-img-active" src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_webp/cover/3/c/3/c/3c3ce33100476bdaab8ffc57e1df6f2e.jpg" alt="">
                </a>
            </div>
            <!-- End Img Song -->

            <!-- Name Song -->
            <div class="info-title">
                <a class="run-text " href=""><span class="info-title-name" id="play-music-name-active">Những bản Hit V-Pop 'thuộc nằm lòng' của mọi nhà</span></a>
                <a href=""><span class="info-title-artist" id="play-music-name--artist-active">Tên tao nè đọc đi m</span></a>
            </div>
            <!-- End Name Song -->

            <div class="info-action">

                <!-- Like Song -->
                <button class="item-actions" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Thích">
                    <i class="fa-regular fa-heart"></i>
                </button>
                <!-- End Like Song -->

                <!-- More Song -->
                <button class="item-actions">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
                <!-- End More Song -->

            </div>
        </div>
        <div class="play-music-player-controls card">

            <div class="card__wrapper action">

                <!-- repeat list songs -->
                <button id="btn-repeat-list" class="card__btn active"><svg fill="none" height="12" viewBox="0 0 20 12" width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Lặp lại">
                        <clipPath id="a">
                            <path d="m0 0h20v12h-20z"></path>
                        </clipPath>
                        <g>
                            <path d="m17 1c0-.265216-.1054-.51957-.2929-.707107-.1875-.187536-.4419-.292893-.7071-.292893h-8v2h7v5h-3l3.969 5 4.031-5h-3zm-14 10c0 .2652.10536.5196.29289.7071.18754.1875.44189.2929.70711.2929h8v-2h-7v-5h3l-4-5-4 5h3z" fill="#fff"></path>
                        </g>
                    </svg>
                </button>
                <!-- End repeat list songs -->

                <!-- pre songs -->
                <button id="btn-prev-song" class="card__btn"><svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Quay lại bải trước">
                        <path d="M11.5 8V0L0 8L11.5 16V8ZM23 0L11.5 8L23 16V0Z" fill="#fff"></path>
                    </svg>
                </button>
                <!-- end pre songs -->

                <!-- pause songs -->
                <button id="btn-pause-song" class="card__btn">
                    <!-- pause songs icon-->
                    <svg class="none" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512" width="20" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Dừng phát"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm224-72V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V184c0-13.3 10.7-24 24-24s24 10.7 24 24zm112 0V328c0 13.3-10.7 24-24 24s-24-10.7-24-24V184c0-13.3 10.7-24 24-24s24 10.7 24 24z" fill="#fff" />
                    </svg>
                    <!-- end pause songs icon-->

                    <!-- end resume songs icon-->
                    <svg class="" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512" width="20" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Tiếp tục"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9V168c0-8.7 4.7-16.7 12.3-20.9z" fill="#fff" />
                    </svg>
                    <!-- end resume songs icon-->

                </button>
                <!-- end pause songs -->

                <!-- next song -->
                <button id="btn-next-song" class="card__btn"><svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Bài tiếp">
                        <path d="M11.5 8V0L23 8L11.5 16V8ZM0 0L11.5 8L0 16V0Z" fill="#fff"></path>
                    </svg>
                </button>
                <!-- end next song -->

                <!-- random list song -->
                <button id="btn-random-list" class="card__btn"><svg fill="#fff" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Phát ngẫu nhiên">
                        <clipPath id="a">
                            <path d="m0 .5h20v19h-20z"></path>
                        </clipPath>
                        <g fill="#fff">
                            <path d="m15 14.5h-1.559l-9.7-10.673c-.09376-.10305-.20802-.18536-.33545-.24168-.12744-.05631-.26523-.08537-.40455-.08532h-3.001v2h2.559l4.09 4.5-4.09 4.501h-2.559v2h3.001c.13932 0 .27711-.029.40455-.0853.12743-.0563.24169-.1387.33545-.2417l4.259-4.687 4.259 4.686c.0938.103.208.1854.3355.2417.1274.0563.2652.0853.4045.0853h2.001v3l5-4-5-4z">
                            </path>
                            <path d="m13.4406 5.5h1.559v3l5-3.938-5-4.062v3h-2.001c-.1393-.00005-.2771.02901-.4045.08532-.1275.05632-.2417.13863-.3355.24168l-3.36798 3.707 1.47998 1.346z">
                            </path>
                        </g>
                    </svg>
                </button>
                <!-- end random list song -->
            </div>
            <div class="card__wrapper">
                <div class="card__time card__time-passed" id="left-time-line">03:34</div>
                <div class="control-volume">
                    <label class="slider">
                        <input type="range" class="level" id="progres-music">
                    </label>
                </div>
                <div class="card__time card__time-left" id="right-time-line">02:04</div>
            </div>

        </div>

        <div class="play-music-content-actions">

            <div class="toogle-sound" >
                <input type="checkbox" id="toggle-volume">
                <label for="toggle-volume" class="toggleSwitch">
                    <div class="speaker" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Bật âm"><svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 75 75">
                            <path d="M39.389,13.769 L22.235,28.606 L6,28.606 L6,47.699 L21.989,47.699 L39.389,62.75 L39.389,13.769z" style="stroke:#fff;stroke-width:5;stroke-linejoin:round;fill:#fff;"></path>
                            <path d="M48,27.6a19.5,19.5 0 0 1 0,21.4M55.1,20.5a30,30 0 0 1 0,35.6M61.6,14a38.8,38.8 0 0 1 0,48.6" style="fill:none;stroke:#fff;stroke-width:5;stroke-linecap:round"></path>
                        </svg></div>

                    <div class="mute-speaker" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Tắt âm"><svg version="1.0" viewBox="0 0 75 75" stroke="#fff" stroke-width="5">
                            <path d="m39,14-17,15H6V48H22l17,15z" fill="#fff" stroke-linejoin="round"></path>
                            <path d="m49,26 20,24m0-24-20,24" fill="#fff" stroke-linecap="round"></path>
                        </svg></div>
                </label>
            </div>
            <div class="control-volume">
                <label class="slider">
                    <input type="range" class="level" id="volume">

                </label>
            </div>
            <div class="boder-height">
                <div></div>
            </div>
            <!-- Show aside playlist -->
            <div class="wrapper-icon icon-show-aside-playlist" id="toggle-play-music-sidebar" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Danh sách phát">
                <i class="fa-regular fa-file-audio"></i>
            </div>

            <!-- End Show aside playlist -->
        </div>
        <script>
            
        </script>

    </div>
</div>