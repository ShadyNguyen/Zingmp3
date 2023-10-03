@extends('layouts.site.main')
@section('title', 'Tìm kiếm')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/search/main.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/pages/artist/main.css') }}">


<link rel="stylesheet" href="{{ url('public/partials/paginateCustom.css') }}">

@stop

@section('content')
<div class="search-content">
<div class="search-header">
        <div class="search-header-content">
            <div class="header-content-title">
                <h3>Kết quả tìm kiếm </h3>
            </div>
            <div class="border-height" style="height: 4rem;">
                <div></div>
            </div>
            <a href="{{route('site.artist.home',['aritistSlug'=>$artist->slug])}}" class="header-content-item">
                <span>
                    Tất cả
                </span>
            </a>
            <a href="{{ route('site.artist.song',['aritistSlug'=>$artist->slug]) }}" class="header-content-item active">
                <span>
                    Bài hát
                </span>
            </a>
            <a href="{{ route('site.artist.album',['aritistSlug'=>$artist->slug]) }}" class="header-content-item">
                <span>
                    Playlist
                </span>
            </a>
        </div>
    </div>
    <div class="search-content">
        <div class="search-content-items">
            @if($listRsSong->count() > 0)
            <div class="search-content-item-title">
                <div><p>{{ $artist->name }} - Tất cả bài hát</p>
                    <div class="wrapper-icon" onclick="playListSongArtist('{{ $artist->id }}')">
                        <i class="fa-solid fa-play"></i>
                    </div>
                </div>
                <div>
                    {{ $listRsSong->withQueryString()->links('partials.paginateCustom') }}

                </div>
            </div>
            <div class="search-list-song">
                @foreach($listRsSong as $song)
                <div class="search-content-item-song">
                    <x-song :song="$song" />
                </div>

                @endforeach
            </div>
            @endif
        </div>
        @if($listRsSong->count() == 0)
        <div class="search-content-items no-content">
            <div class="wrapper-icon">
                <i class="fa-solid fa-compact-disc"></i>
            </div>
            <p>Không có bài hát nào</p>
        </div>
        @endif



    </div>
</div>

@stop