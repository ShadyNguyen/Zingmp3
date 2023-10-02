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



    </div>
</div>

@stop