@extends('layouts.site.main')

@section('title', 'Trang chủ')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/home.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listSong.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listAlbum.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listArtist.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/slide.css') }}">

@stop

@section('content')
<div class="home-page-content">
    <x-slide />
    <div class="home-page-content-items">
        <div class="list-song-wrapper">
            <div class="main-items-header">
                <div class="items-header-subtitle">
                    <span>Bắt đầu nghe từ một bài hát</span>
                </div>
                <div class="items-header-title">
                    Gợi Ý Từ top 10 bài hát có lượt nge cao nhất
                </div>
            </div>
            <div class="main-items-content">
                @foreach($topSongs as $song)
                <!-- item -->
                <x-song :song="$song" />
                <!-- End item -->
                @endforeach
            </div>
        </div>
    </div>

    @if($topArtists->count() > 0)
    <div class="home-page-content-items">
        <x-list-album title="Có Thể Bạn Muốn Nghe" :listAlbum="$topAlbums"/>
    </div>
    @endif

    @if($topArtists->count() > 0)
    <div class="home-page-content-items">
            <x-list-artist :listArtists="$topArtists" title="Top 10 nghệ sĩ" />
        </div>
    @endif
</div>

@stop