
<div class="list-album-wrapper">
    @if(!empty($title))
    <div class="main-items-header">
        <div class="items-header-title">
            {{ $title }}
        </div>
    </div>
    @endif
    <div class="main-items-content album">
        @if($addAlbum)
        <div class="create-playlist" onclick="toggleAddPlayList(true)">
            <div class="wrapper-icom">
                <i class="fa-regular fa-square-plus"></i>
            </div>
            <p>tạo playlist mới</p>
        </div>
        @endif
        @foreach($listAlbum as $album)
        
        
        <div class="items-content">
            <div class="wrapper-items-album">
                <div class="items-album-img">
                    <img src="{{ $album->avatar ? $album->avatar : 'anh.jp' }}" alt="" onerror="replaceEmptyImage(this)">
                </div>
                @if($check)
                    <button class="item-actions" 
                        @auth('user') 
                            onclick="likePlayList(this,'{{ $album->id }}','{{$album->title }}')"  
                        @else 
                            onclick="showAlerLogin()" 
                        @endauth
                    >
                    @auth('user')
                        @if(Auth::guard('user')->user()->checkLikePlaylists($album->id))
                            <i class="fa-solid fa-heart"></i>
                        @else
                            <i class="fa-regular fa-heart"></i>

                        @endif
                        
                    @else
                    
                        <i class="fa-regular fa-heart"></i>
                    @endauth
                    </button>
                @else
                    <button class="item-actions" data-id-playlist="{{ $album->id }}" data-id-user=" {{ Auth::guard('user')->user()->id }} " onclick="showConfirmDeletePlayList(this,true)">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                @endif
                
                <button class="item-actions play" 
                @if($album->songs->count() > 0)
                    onclick="playAlbum('{{$album->id}}')"
                @else
                    onclick="addNotification('notification','Danh sách phát này chưa có bài hát',3000)"
                @endif
                >
                    <i class="fa-regular fa-circle-play"></i>
                </button>
                @if($check)
                <button class="item-actions">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
                @else
                <!-- Edit -->
                    <a href="{{ route('site.mymusic.playlist.edit',['slugPlaylist'=>$album->slug]) }}" class="item-actions">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                <!-- end edit -->
                @endif
            </div>
            <div class="name-user-album">
                <a href="{{ route('site.song.album',['albumSlug'=>$album->slug]) }}" class="name">{{ $album->title }}</a>
                <br>
                <span >{{ $album->user->name }}</span>
            </div>
        </div>
        @endforeach
        
        
    </div>
</div>
@if(!$check)
<script>
    const reloadPagePlaylist = true
</script>
@endif