@extends('layouts.site.main')
@section('title', '{{ $artist->name }}')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/search/main.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listAlbum.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listArtist.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/pages/artist/main.css') }}">


@stop

@section('content')

    <div class="search-content">
    
        <div class="content-banner">
            <div class="bg-banner">
                <div class="blur" style="background-image: url( '{{ $artist->avatar }}' );"></div>
                <div class="bg-banner-color">

                </div>
            </div>
            <div class="content-banner-info">
                <div class="info-wrapper">
                    <div class="info-avatar">
                        <img src="{{ $artist->avatar }}" alt="">
                    </div>
                    <div class="info-content">
                        <div class="info-content-title">
                            <h3>{{ $artist->name }}</h3>
                            <div class="wrapper-icon" onclick="playListSongArtist('{{ $artist->id }}')">
                            <i class="fa-solid fa-play"></i>
                            </div>
                        </div>
                        <?php

                        
                        ?>
                        <div class="info-content-des">
                            <span>{{ $artist->total_followers }} người quan tâm</span>
                            <div class="artist-action">
                            
                            <button class="artist-action-follow @auth('user') @if(auth('user')->user()->checkFollowArtists($artist->id)) active @endif @endauth" data-name-artist="{{ $artist->name}}" @auth('user') onclick="setFolowerArtist(this,'{{ $artist->id }}')" @else onclick="showAlerLogin()" @endauth>
                                <div class="wrapper-icon">
                                    <i class="fa-solid fa-user-plus"></i>
                                </div>
                                <div class="artist-action-title">
                                @auth('user') @if(auth('user')->user()->checkFollowArtists($artist->id)) Bỏ theo dõi @else Theo dõi @endif @endauth
                                </div>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="search-content">
            <div class="search-content-items">
                @if($artist->songs->count() > 0)
                <div class="search-content-item-title">
                    <p>Bài hát</p>
                    <a href="{{route('site.artist.song',['aritistSlug'=>$artist->slug])}}">Tất cả</a>
                </div>
                <div class="search-list-song">
                    @foreach($artist->songs as $song)
                            <div class="search-content-item-song">
                                <x-song :song="$song" />
                            </div>
                        
                    @endforeach
                </div>
                @endif
            </div>

            <div class="search-content-items">
                <div class="search-content-item-title">
                    <p>Album</p>
                    <a href="{{route('site.artist.album',['aritistSlug'=>$artist->slug])}}">Tất cả</a>
                </div>
                <div class="search-list-album">     
                    <x-list-album title=""/>
                </div>
            </div>
            
        </div>
    </div>

@stop