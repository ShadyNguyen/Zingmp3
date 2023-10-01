<!-- item -->
<div class="wrapper-items-song dropdown">
    <button class="item-actions none">
        <i class="fa-regular fa-square-check"></i>
    </button>
    <!-- song -->
    <div class="item-song">
        <div class="item-song-wrapper">
            <div class="item-song-content">
                <div class="song-thumb">
                    <img src="{{ $song->thumbnail }}" alt="">
                    <button class="song-thumb-action" onclick="addSongToListBtn('{{ $song->id }}')">
                        <i class="fa-solid fa-play "></i>
                        <i class="fa-regular fa-circle-pause fa-spin hidden"></i>
                    </button>
                </div>
                <div class="song-info">
                    <a class="song-info-name"><span>{{ $song->name }}</span></a>
                    <a class="song-info-astist">
                        <span>{{ $song->user->name }}
                            @if($song->user->is_celeb)
                            <i class="fa-solid fa-star"></i>
                            @endif
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- like btn -->
    @auth('user')
        @if($isLike)
            <button class="item-actions" data-name-song="{{ $song->name }}" onclick="likeSong(this,'{{ $stringJs }}')">
                <i class="fa-solid fa-heart active"></i>
            </button>

        @else
            <button class="item-actions" data-name-song="{{ $song->name }}" onclick="likeSong(this,'{{ $stringJs }}')">
                <i class="fa-regular fa-heart"></i>
            </button>
        @endif
    @else
            <button class="item-actions" onclick="showAlerLogin()">
                <i class="fa-regular fa-heart"></i>
            </button>
    @endauth
    <!-- end like btn -->



    <button class="item-actions" id="id-test" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis"></i>
    </button>
    <!-- more song -->
    <div class="dropdown-menu song-menu" aria-labelledby="id-test">
        <div class="menu-list song-info-menu">
            <div class="thumb-song">
                <img src="{{ $song->thumbnail }}" alt="">
            </div>
            <div class="content-song">
                <p class="content-song-title">{{ $song->name }}</p>
                <div class="content-song-stats">
                    <div class="stat-item">
                        <i class="fa-regular fa-heart"></i>
                        <span>{{ $song->user->name }}</span>
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
            <div class="action-item-content" onclick="setNextSongBtn('{{ $song->id }}')">
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
                    
                    <div class="menu-list-action-item mt-3" @auth('user') onclick="toggleAddPlayList(true)" @else onclick="showAlerLogin()" @endauth('user')>
                        <div class="action-item-content">
                            <div class="wrapper-icon add-playlist-i">
                                <i class="fa-solid fa-plus "></i>
                            </div>
                            <span>Tạo playlist mới</span>
                        </div>
                    </div>
                    @auth('user')
                        @if(Auth::guard('user')->user()->playLists->count() > 0)
                            @foreach(Auth::guard('user')->user()->playLists as $playList)
                            <div class="menu-list-action-item" data-name="{{$playList->title}}" data-add-song-playlist-song="{{ $song->id }}" data-add-song-playlist-user="{{ Auth::guard('user')->user()->id }}" data-add-song-playlist-id="{{ $playList->id }}">
                                <div class="action-item-content">
                                    <div class="wrapper-icon">
                                        <i class="fa-solid fa-music"></i>
                                    </div>
                                    <span>{{$playList->title}}</span>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="action-item-content empty-content">
                                <div class="wrapper-icon">
                                    <i class="fa-solid fa-icons"></i>
                                </div>
                                <span>Không có playlist</span>
                            </div>
                        @endif
                    @else
                    <div class="action-item-content empty-content">
                        <div class="wrapper-icon">
                            <i class="fa-solid fa-icons"></i>
                        </div>
                        <span>Không có playlist</span>
                    </div>
                    @endauth
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
<!-- End item -->