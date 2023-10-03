@extends('layouts.site.main')
@section('title', 'Playlist của tôi')

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
                    <h3>Playlist của tôi</h3>
                </div>
                <div class="border-height" style="height: 4rem;">
                    <div></div>
                </div>
                
                <a href="#" class="header-content-item active">
                    <span>
                        Playlist
                    </span>
                </a>
                
            </div>
        </div>
        <div class="search-content">
            <div class="search-content-items search-content-header">
                
            
            <div class="search-content-items">
                <div class="search-content-item-title">
                    
                    <div>
                    {{ $playlists->withQueryString()->links('partials.paginateCustom') }}

                    </div>
                </div>
                <div class="search-list-album">     
                    <x-list-album addAlbum="true" title="" :listAlbum="$playlists" type="editPlayList"/>
                </div>
            </div>
            @if($playlists->count() == 0)
                <div class="search-content-items no-content">
                        <div class="wrapper-icon">
                            <i class="fa-solid fa-compact-disc"></i>
                        </div>
                        <p>Bạn chưa tạo play list nào</p>
                </div>
            </div>
            @endif
            
        </div>
    </div>

@stop