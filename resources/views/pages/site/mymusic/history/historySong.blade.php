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
                    <h3>Phát gần đây </h3>
                </div>
                <div class="border-height" style="height: 4rem;">
                    <div></div>
                </div>
            
                <a href="#" class="header-content-item active">
                    <span>
                        Bài hát
                    </span>
                </a>
                <a href="{{ route('site.mymusic.history',['type'=>'playlist']) }}" class="header-content-item">
                    <span>
                        Playlist
                    </span>
                </a>
                
            </div>
        </div>
        <div class="search-content">
            <div class="search-content-items">
                @if($listHistorySong->count() > 0)
                <div class="search-content-item-title">
                    <p>Bài hát</p>
                    <div>
                    {{ $listHistorySong->withQueryString()->links('partials.paginateCustom') }}

                    </div>

                </div>
                <div class="search-list-song">
                    @foreach($listHistorySong as $history)
                            <div class="search-content-item-song">
                                <x-song :song="$history->song" />
                            </div>
                        
                    @endforeach
                </div>
                @endif
            </div>

           
            
        </div>
    </div>

@stop