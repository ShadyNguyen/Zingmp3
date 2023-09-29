<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function home(){
       
        $quantityTopSong = 9;
        $quantityTopArtists = 5;

        $listPlayListAside = [];

        $topSongs = Song::orderBy('total_listen','desc')->take($quantityTopSong)->orderBy('total_listen', 'desc')->get();
        $topArtists = User::where('is_celeb',true)->take($quantityTopArtists)->orderBy('total_followers', 'desc')->get();

        
        return view('pages.site.home',compact('topSongs','topArtists'));
    }
}
