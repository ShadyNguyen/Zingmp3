<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
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

        $topSongs = Song::where('status',true)->orderBy('total_listen','desc')->take($quantityTopSong)->orderBy('total_listen', 'desc')->get();
        $topArtists = User::where('is_celeb',true)->where('status',true)->where('role','user')->take($quantityTopArtists)->orderBy('total_followers', 'desc')->get();

        
        return view('pages.site.home',compact('topSongs','topArtists'));
    }

    public function searchAll(Request $request){  
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        } 

        $quantityRsArtist = 5;
        $quantityRsSong = 10;
        $quantityRsAlbum = 4;

        $q = $request->q;

        $listRsSong = Song::where(function ($query) use ($q) {
            $query->where('name','like','%'.$q.'%')->orWhereHas('user',function ($query) use ($q){
                $query->where('name', 'like', '%' . $q . '%');
            });
        })
        ->where('status',true)
        ->orderBy('total_listen', 'desc')
        ->take($quantityRsSong)->get();

        $listArtist = User::where('name', 'like', '%' . $q . '%')
        ->where('status',true)
        ->where('role','user')
        ->take($quantityRsArtist)->get();
        
        $listAlbum = Playlist::where('title', 'like', '%' . $q . '%')
        ->take($quantityRsAlbum)
        ->where('status',true)
        ->get();

        return view('pages.site.search.all',compact('listRsSong','listArtist','listAlbum'));
        
    }
    public function searchSong(Request $request){
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        }
        $q = $request->q;
        $quantityRsSong = 30;
        $listRsSong = Song::where(function ($query) use ($q) {
            $query->where('name','like','%'.$q.'%')->orWhereHas('user',function ($query) use ($q){
                $query->where('name', 'like', '%' . $q . '%');
            });
        })
        ->where('status',true)
        ->orderBy('total_listen', 'desc')
        ->take($quantityRsSong)->get();
        return view('pages.site.search.song',compact('listRsSong'));

    }
    public function searchArtist(Request $request){
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        }
        $q = $request->q;
        $quantityRsArtist = 50;

        $listArtist = User::where('name', 'like', '%' . $q . '%')
        ->where('status',true)
        ->where('role','user')
        ->take($quantityRsArtist)->get();

        return view('pages.site.search.artist',compact('listArtist'));
    }

    public function searchPlaylist(Request $request){
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        }
        $q = $request->q;
        $quantityRsAlbum = 50;

        $listAlbum = Playlist::where('title', 'like', '%' . $q . '%')
        ->take($quantityRsAlbum)
        ->where('status',true)
        ->get();

        return view('pages.site.search.album',compact('quantityRsAlbum'));
    }
}
