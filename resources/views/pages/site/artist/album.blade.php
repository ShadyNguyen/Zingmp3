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
       
        <div class="search-content">
            

            <div class="search-content-items">
                <div class="search-content-item-title">
                <div><p>{{ $artist->name }}  - Tất Cả Single & Ep</p>
                    
                </div>
                    <div>
                    {{ $listAlbum->withQueryString()->links('partials.paginateCustom') }}

                    </div>
                </div>
                <div class="search-list-album">     
                    <x-list-album title=""/>
                </div>
            </div>
            
        </div>
    </div>

@stop