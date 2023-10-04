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
                <h3>Bài hát</h3>
            </div>
            <div class="border-height" style="height: 4rem;">
                <div></div>
            </div>

            <a href="#" class="header-content-item active">
                <span>
                    {{ $song->name }}
                </span>
            </a>

        </div>
    </div>
    <div class="search-content">
        <div class="search-content-items search-content-header">
            <div class="items-content edit">
                <div class="wrapper-items-album">
                    <div class="items-album-img">
                        <img src="{{ $song->getThumnail(480) ? $song->getThumnail(480) : 'anh.jp' }}" alt="" onerror="replaceEmptyImage(this)">
                    </div>
                    <button class="item-actions play" onclick="addSongToListBtn('{{ $song->id }}')">
                        <i class="fa-regular fa-circle-play"></i>
                    </button>
                </div>
                <div class="name-user-album">
                    <div class="action">
                        <a href="#" class="name">{{ $song->name }}
                            <span>
                                @auth('user')
                                @if(Auth::guard('user')->user()->checkLikeSong($song->id))
                                <button class="item-actions" data-name-song="{{ $song->name }}" onclick="likeSong(this,'{{$song->id}}')">
                                    <i class="fa-solid fa-heart active"></i>
                                </button>

                                @else
                                <button class="item-actions" data-name-song="{{ $song->name }}" onclick="likeSong(this,'{{$song->id}}')">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                                @endif
                                @else
                                <button class="item-actions" onclick="showAlerLogin()">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                                @endauth
                            </span>
                        </a>
                    </div>

                    <span>Tác giả <strong><a href="{{ route('site.artist.home',['aritistSlug'=>$song->user->slug]) }}">{{ $song->user->name }}</a></strong> </span>
                    <span> Ngày phát hành <strong>{{ $handleDate($song->created_at) }} </strong></span>
                    <span> {{ $song->total_like }} lượt thích • {{ $song->total_listen }} lượt nge</span>

                    <button class="btn-outline" onclick="playListSongArtist('{{ $song->user->id }}')">
                        <i class="fa-solid fa-play"></i>
                        <span>PHÁT TẤT CẢ</span>
                    </button>
                </div>
            </div>
            <div style="width: 100%;">
                <div class="edit-wrapper">
                    <div class="search-content-item-title">
                        <p>Bài hát cùng tác giả</p>
                    </div>
                    @php
                        $filtered_songs = $song->user->songs->filter(function ($songItem) use ($song) {
                        return $songItem->id !== $song->id;
                        });
                    @endphp
                    @foreach($filtered_songs as $songItem)

                    <div class="search-content-item-song">
                        <x-song :song="$songItem" :isDelete="true" />
                    </div>

                    @endforeach
                </div>
                @if($filtered_songs->count() == 0)
                <div class="search-content-items no-content">
                    <div class="wrapper-icon">
                        <i class="fa-solid fa-compact-disc"></i>
                    </div>
                    <p>Không còn bài hát nào</p>
                </div>
                @endif
            </div>


        </div>

    </div>


    @stop