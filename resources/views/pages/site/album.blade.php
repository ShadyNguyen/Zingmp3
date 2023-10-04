@extends('layouts.site.main')
@section('title', 'Chỉnh sửa')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/search/main.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listAlbum.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listArtist.css') }}">
<link rel="stylesheet" href="{{ url('public/partials/paginateCustom.css') }}">



@stop

@section('content')
<div class="search-content">

    <div class="search-header">
        <div class="search-header-content">
            <div class="header-content-title">
                <h3>Playlist</h3>
            </div>
            <div class="border-height" style="height: 4rem;">
                <div></div>
            </div>

            <a href="#" class="header-content-item active">
                <span>
                    {{ $playlist->title }}
                </span>
            </a>

        </div>
    </div>
    <div class="search-content">
        <div class="search-content-items search-content-header">
            <div class="items-content edit">
                <div class="wrapper-items-album">
                    <div class="items-album-img">
                        <img src="{{ $playlist->avatar ? $playlist->avatar : 'anh.jp' }}" alt="" onerror="replaceEmptyImage(this)">
                    </div>
                    <button class="item-actions play" @if($playlist->songs->count() > 0)
                        onclick="playAlbum('{{$playlist->id}}')"
                        @else
                        onclick="addNotification('notification','Danh sách phát này chưa có bài hát',3000)"
                        @endif
                        >
                        <i class="fa-regular fa-circle-play"></i>
                    </button>

                </div>
                <div class="name-user-album">
                    <div class="action">
                        <a href="#" class="name">
                            {{ $playlist->title }}
                            <span>
                                <button class="item-actions" @auth('user') onclick="likePlayList(this,'{{ $playlist->id }}','{{$playlist->title }}')" @else onclick="showAlerLogin()" @endauth>
                                    @auth('user')
                                    @if(Auth::guard('user')->user()->checkLikePlaylists($playlist->id))
                                    <i class="fa-solid fa-heart"></i>
                                    @else
                                    <i class="fa-regular fa-heart"></i>

                                    @endif

                                    @else

                                    <i class="fa-regular fa-heart"></i>
                                    @endauth
                                </button>
                            </span>
                        </a>

                    </div>

                    <span>Tạo bởi <strong>{{ $playlist->user->name }}</strong> </span>
                    <span> {{ $playlist->status? "Công khai": "Riêng tư" }} </span>

                </div>
            </div>
            <div style="width: 100%;">
                <div class="edit-wrapper">
                    <div class="search-content-item-title">
                        <p>Bài hát</p>
                    </div>
                    @foreach($playlist->songs as $song)

                    <div class="search-content-item-song">
                        <x-song :song="$song" />
                    </div>

                    @endforeach
                </div>
                @if($playlist->songs()->count() == 0)
                <div class="search-content-items no-content">
                    <div class="wrapper-icon">
                        <i class="fa-solid fa-compact-disc"></i>
                    </div>
                    <p>Không có bài hát nào</p>
                </div>
                @endif
            </div>


        </div>

    </div>


    @stop