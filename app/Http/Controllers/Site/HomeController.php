<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\SearchHistory;
use App\Models\SearchHistoty;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

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
        $lastQ = $q;

        if(Auth::guard('user')->check())
        {
            SearchHistory::create(['id_user'=>Auth::guard('user')->user()->id,'search_keyword'=>$q]);
        }

        return view('pages.site.search.all',compact('listRsSong','listArtist','listAlbum','lastQ'));
        
    }
    public function searchSong(Request $request){
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        }
        $q = $request->q;
        $quantityRsSong = 20;
        $listRsSong = Song::where(function ($query) use ($q) {
            $query->where('name','like','%'.$q.'%')->orWhereHas('user',function ($query) use ($q){
                $query->where('name', 'like', '%' . $q . '%');
            });
        })
        ->where('status',true)
        ->orderBy('total_listen', 'desc')
        ->paginate($quantityRsSong);
        $lastQ = $q;
        return view('pages.site.search.song',compact('listRsSong','lastQ'));

    }
    public function searchArtist(Request $request){
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        }
        $q = $request->q;
        $quantityRsArtist = 30;

        $listArtist = User::where('name', 'like', '%' . $q . '%')
        ->where('status',true)
        ->where('role','user')
        ->paginate($quantityRsArtist);

        $lastQ = $q;
        return view('pages.site.search.artist',compact('listArtist','lastQ'));
    }

    public function searchPlaylist(Request $request){
        if (!$request->has('q')) {
            return redirect()->route('site.home');
        }
        $q = $request->q;
        $quantityRsAlbum = 20;

        $listAlbum = Playlist::where('title', 'like', '%' . $q . '%')
        ->where('status',true)
        ->paginate($quantityRsAlbum);
        $lastQ = $q;

        return view('pages.site.search.album',compact('listAlbum','lastQ'));
    }
    public function homeArtist(string $aritistSlug){
        if(empty($aritistSlug)){
            return redirect()->route('site.home');
        }
        $artist = User::where('slug', $aritistSlug)->first();
        if(!$artist || !$artist->isUserActive()){
            return redirect()->route('site.home');
        }
        
        return view('pages.site.artist.home',compact('artist'));
    }

    public function songArtist(string $aritistSlug){

        
        if(empty($aritistSlug)){
            return redirect()->route('site.home');
        }
        $quantityRsSong = 10;
        $artist = User::where('slug', $aritistSlug)->first();
        if(!$artist || !$artist->isUserActive()){
            dd($aritistSlug);
            return redirect()->route('site.home');
        }
        $listRsSong = $artist->songs()->where('status',true)->paginate($quantityRsSong);
        // dd($listRsSong);
        return view('pages.site.artist.song',compact('listRsSong','artist'));

    }
    public function albumArtist(string $aritistSlug){

        
        if(empty($aritistSlug)){
            return redirect()->route('site.home');
        }
        $quantityRsAlbum = 10;
        $artist = User::where('slug', $aritistSlug)->first();
        if(!$artist || !$artist->isUserActive()){
            dd($aritistSlug);
            return redirect()->route('site.home');
        }
        $listAlbum = $artist->playlists()->where('status',true)->paginate($quantityRsAlbum);
        // dd($listRsSong);
        return view('pages.site.artist.album',compact('listAlbum','artist'));

    }
}
