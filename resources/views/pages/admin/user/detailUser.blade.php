@extends('layouts.admin.main')
@section('title', 'User')

@section('css')
<link rel="stylesheet" href="{{ url('public/admin/css/pages/user/detail.css') }}">

@stop

@section('title-content','Quản lý user')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
    </ol>
</nav>
<div class="row justify-content-between gap-5 p-3">
    <div class="col-12 card">
        <div class="col-12 info">
            <div class="info-left">
                <div class="info-left-avatar">
                    <div class="avatar-radius">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                </div>
                <div class="info-left-detail">
                    <div class="info-name">
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="info-since">
                        <span>{{ $user->username }}</span>
                    </div>
                    <div class="info-action">
                        <button type="button" class="btn btn-secondary">Primary</button>
                    </div>
                </div>
            </div>
            <div class="info-right">
                <div class="info-right-actions">
                    <button type="button" class="btn btn-light">Khóa</button>
                </div>
                <div class="info-right-statistics">
                    <div class="statistic">
                        <div class="wrapper-icon bg-primary">
                            <i class="fa-solid fa-music"></i>
                        </div>
                        <div class="statistic-info">
                            <span class="text-muted">Bài hát</span>
                            <p>{{ $user->songs->count() }}</p>
                        </div>
                    </div>

                    <div class="statistic">
                        <div class="wrapper-icon bg-success">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="statistic-info ">
                            <span class="text-muted">Folowers</span>
                            <p>{{ $user->total_followers }}</p>
                        </div>
                    </div>

                    <div class="statistic">
                        <div class="wrapper-icon bg-orange">
                            <i class="fa-solid fa-wifi"></i>
                        </div>
                        <div class="statistic-info">
                            <span class="text-muted">Folowing</span>
                            <p>{{ $user->followArtists->count() }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 menu-tab">
            <ul>
                <li class="active" data-show="info-show"><span>Thông tin</span></li>
                <li data-show="song-show"><span>Bài hát</span></li>
                <li data-show="follower-show"><span>Follower</span></li>
                <li data-show="following-show"><span>Following</span></li>
            </ul>
        </div>
    </div>



    <div class="more-show row col-12 card info-detail-info" id="info-show">
        <h2 class="col-12">Thông tin</h2>
        <p class="col-6">Full name: <strong>{{ $user->name }}</strong></p>
        <p class="col-6">User name: <strong>{{ $user->username }}</strong></p>
        <p class="col-6">Email: <strong>Toanf2103</strong></p>
        <p class="col-6">Phone: <strong>0123134</strong></p>
        <h2 class="col-12">Mô tả</h2>
        <span class="col-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus obcaecati at dolorum similique eveniet adipisci aut, nisi consectetur dolor, impedit optio cum aliquam distinctio! Modi amet blanditiis odit unde numquam!</span>
    </div>

    <div class="more-show row none" id="song-show">
        bb
    </div>

    <div class="more-show row none" id="follower-show">
        <div class="row mb-3">
            <div class="col-8">

            </div>
            <div class="card col-4 search-follow">
                <input type="text" autocomplete="off" id="follower-show">
                <div class="wrapper-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>


        <div id="tbFollower" class="row list-follow" data-table="follower-show">

            

        </div>
    </div>

    <div class="more-show row none" id="following-show">
        <div class="row mb-3">
            <div class="col-8">

            </div>
            <div class="card col-4 search-follow">
                <input type="text" autocomplete="off" id="following-show">
                <div class="wrapper-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>

        <div id="tbFollower" class="row list-follow" data-table="following-show">
        </div>
    </div>
</div>
<input type="hidden" value="{{ $user->id }}" id="__ID_USER_DETAIL">
@stop
@section('js')
<script src="{{  url('public/admin/js/pages/userDetail.js')  }}"></script>
@stop