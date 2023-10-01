@extends('layouts.site.main')
@section('title', 'Tìm kiếm')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/search/main.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listAlbum.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listArtist.css') }}">


@stop

@section('content')
    <div class="search-content">
        <div class="search-header">
            <div class="search-header-content">
                <div class="header-content-title">
                    <h3>Kết quả tìm kiếm</h3>
                </div>
                <div class="border-height" style="height: 4rem;">
                    <div></div>
                </div>
                <a href="{{ route('site.search.all', ['q' => 'a']) }}" class="header-content-item">
                    <span>
                        Tất cả
                    </span>
                </a>
                <a href="{{ route('site.search.song', ['q' => 'a']) }}" class="header-content-item">
                    <span>
                        Bài hát
                    </span>
                </a>
                <a href="{{ route('site.search.playlist', ['q' => 'a']) }}" class="header-content-item">
                    <span>
                        Playlist
                    </span>
                </a>
                <a href="{{ route('site.search.artist', ['q' => 'a']) }}" class="header-content-item active">
                    <span>
                        Nghệ sĩ
                    </span>
                </a>
            </div>
        </div>
        <div class="search-content">
            

            
            @if($listArtist->count() > 0)
            <div class="search-content-items">
                <div class="search-content-item-title">
                    <p>Artist</p>
                    
                </div>
                <div class="search-list-album"> 
                
                    <x-list-artist :listArtists="$listArtist" title="" />
                
                </div>
            </div>
            @endif
        </div>
    </div>

@stop