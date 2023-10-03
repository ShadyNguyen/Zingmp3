<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    
    public function history(string $type){
        if(empty($type)){
            $type='bai-hat';
        }
        switch($type){
            case 'bai-hat':
                return $this->historySong();
                break;
            case 'playlist':
                return $this->historyPlaylist();
                break;
            default:
                return redirect()->route('site.home');
                break;
        }
    }
    public function historySong(){
        $quantityRsHistory = 20;
       
        
        $user = User::find(Auth::guard('user')->user()->id);
        $listHistorySong = $user->songListenerHistorys()->orderBy('created_at' ,'desc')->paginate($quantityRsHistory);
        return view('pages.site.mymusic.history.historySong',compact('listHistorySong'));
    }
    public function historyPlaylist(){
        dd('chua lam');
    }
    
    public function favorite(string $type){
        if(empty($type)){
            $type='song';
        }
        switch($type){
            case 'song':
                return $this->getFavoriteSong();
                break;
            case 'playlist':
                return $this->getFavoritePlaylist();
                break;
            default:
                return redirect()->route('site.home');
                break;
        }
    }
    public function getFavoriteSong(){
        $quantityRsHistory = 20;
        
        $user = User::find(Auth::guard('user')->user()->id);
        $listSongFavorite = $user->favoriteSong()->where('status',true)->paginate($quantityRsHistory);
        
        return view('pages.site.mymusic.favorite.favoriteSong',compact('listSongFavorite'));
    }
    public function getFavoritePlaylist(){
        $quantityRsHistory = 20;
        
        $user = User::find(Auth::guard('user')->user()->id);
        $listPlaylistFavorite = $user->favoritePlayList()->where('status',true)->paginate($quantityRsHistory);
        
        return view('pages.site.mymusic.favorite.favoritePlaylist',compact('listPlaylistFavorite'));
    }

    public function playlist(){
        $quantityPlaylists =10;
        $user = User::find(Auth::guard('user')->user()->id);

        $playlists = Playlist::where('id_user',$user->id)->paginate($quantityPlaylists);

        return view('pages.site.mymusic.playlist.playlist',compact('playlists'));
    }
    public function editPlaylist(string $slugPlayList){
        $user = User::find(Auth::guard('user')->user()->id);

        $playlist = Playlist::where('id_user',$user->id)->where('slug',$slugPlayList)->first();
        return view('pages.site.mymusic.playlist.edit',compact('playlist'));

    }
}
