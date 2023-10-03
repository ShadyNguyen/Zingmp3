@extends('layouts.site.main')
@section('title', 'Tìm kiếm')

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
            <a href="{{ route('site.artist.song',['aritistSlug'=>$artist->slug]) }}" class="header-content-item">
                <span>
                    Bài hát
                </span>
            </a>
            <a href="{{ route('site.artist.album',['aritistSlug'=>$artist->slug]) }}" class="header-content-item active">
                <span>
                    Playlist
                </span>
            </a>
        </div>
    </div>
    <div class="search-content">
        <div class="search-content-items">

            <div class="search-content-item-title">
                <div>
                    <p>{{ $artist->name }} - Tất Cả Single & Ep</p>

                </div>
                <div>
                    {{ $listAlbum->withQueryString()->links('partials.paginateCustom') }}

                </div>
            </div>
            <div class="search-list-album">
                <x-list-album title="" :listAlbum="$listAlbum" />
            </div>
        </div>
        @if($listAlbum->count() == 0)
        <div class="search-content-items no-content">
            <div class="wrapper-icon">
                <i class="fa-solid fa-compact-disc"></i>
            </div>
            <p>Không có playlist nào</p>
        </div>
        @endif

    </div>
</div>

@stop