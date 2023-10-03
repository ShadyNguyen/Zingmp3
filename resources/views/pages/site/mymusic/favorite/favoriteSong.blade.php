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
                    <h3>Yêu thích </h3>
                </div>
                <div class="border-height" style="height: 4rem;">
                    <div></div>
                </div>
            
                <a href="{{ route('site.mymusic.favorite',['type'=>'song']) }}" class="header-content-item active">
                    <span>
                        Bài hát
                    </span>
                </a>
                <a href="{{ route('site.mymusic.favorite',['type'=>'playlist']) }}" class="header-content-item">
                    <span>
                        Playlist
                    </span>
                </a>
                
            </div>
        </div>
        <div class="search-content">
            @if($listSongFavorite->count() == 0)
            <div class="search-content-items no-content">
                    <div class="wrapper-icon">
                        <i class="fa-solid fa-compact-disc"></i>
                    </div>
                    <p>Bạn chưa yêu thích playlist nào</p>
            </div>  
            @else
            
            <div class="search-content-items">
                
                <div class="search-content-item-title">
                    <p>Bài hát</p>
                    <div>
                    {{ $listSongFavorite->withQueryString()->links('partials.paginateCustom') }}

                    </div>

                </div>
                <div class="search-list-song">
                    @foreach($listSongFavorite as $song)
                            <div class="search-content-item-song">
                                <x-song :song="$song" />
                            </div>
                        
                    @endforeach
                </div>
                
            </div>
            @endif

           
            
        </div>
    </div>

@stop