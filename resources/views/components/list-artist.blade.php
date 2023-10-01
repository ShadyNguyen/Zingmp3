<div class="list-artist-wrapper">
    @if(!empty($title))
    <div class="main-items-header">
        <div class="items-header-title">
            {{ $title }}
        </div>
    </div>
    @endif
    <div class="main-items-content artist">
        @foreach($listArtists as $artist)
        <?php

        $stringJS = '';
        $isFollowed = false;
        if ($user) {
            if ($user->checkFollowArtists($artist->id)) {
                $isFollowed = true;
            }
            $stringJS =  "onclick=setFolowerArtist(this,'".$user->id."','".$artist->id."')";
        }
        ?>
        <div class="artist-item">
            <div class="wrapper-avatar">
                <div class="wrapper-avatar-content" onclick="playListSongArtist('{{ $artist->id }}')">

                    <div class="artist-avatar">
                        <img src="{{ $artist->avatar }}" alt="">
                    </div>
                    <div class="wrapper-icon">
                        <i class="fa-solid fa-shuffle"></i>
                    </div>
                </div>

            </div>

            <div class="artist-info">
                <div class="artist-info-name">
                    <a>{{ $artist->name }}</a>
                </div>
                <div class="artist-info-follower">
                    <a>{{ $artist->total_followers }}K quan tâm</a>
                </div>
            </div>
            <div class="artist-action">
                @if($isFollowed)
                <button class="artist-action-follow active" data-name-artist="{{ $artist-> name}}" {{$stringJS}}>
                    <div class="wrapper-icon">
                        <i class="fa-solid fa-shuffle"></i>
                    </div>
                    <div class="artist-action-title">
                        Bỏ theo dõi
                    </div>
                </button>

                @else
                
                <button class="artist-action-follow" data-name-artist="{{ $artist-> name}}" @auth('user') {{$stringJS}} @else onclick="showAlerLogin()" @endauth>
                    <div class="wrapper-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div class="artist-action-title">
                        Theo dõi
                    </div>
                </button>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>