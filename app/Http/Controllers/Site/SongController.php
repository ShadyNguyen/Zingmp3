<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\Site\SongResource;
use App\Models\DetailPlaylist;
use App\Models\FollowArtist;
use App\Models\LikeSong;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\SongListenerHistory;
use App\Models\User;
use Illuminate\Http\Request;

class SongController extends Controller
{

    public function likeSong(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required',
            'id_song' => 'required'
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_user = $request->id_user;
        $id_song = $request->id_song;
        $user = User::where('id', $id_user)->first();
        $song = Song::where('id', $id_song)->first();
        if (User::where('id', $id_user)->exists() && $user->isUserActive() && $song) {
            $likeSongExists = LikeSong::where('id_user', $id_user)->where('id_song', $id_song)->exists();
            if ($likeSongExists) {
                LikeSong::where('id_user', $id_user)->where('id_song', $id_song)->delete();

                $song->total_like = $song->total_like - 1;
                $song->save();
                return response()->json([
                    'isLike' => false
                ], 200);
            } else {
                LikeSong::create(['id_user' => $id_user, 'id_song' => $id_song]);
                $song->total_like = $song->total_like + 1;
                $song->save();
                return response()->json([
                    'isLike' => true
                ], 200);
            }
        }

        return response()->json([], 503);
    }

    public function followArtist(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required',
            'id_artist' => 'required'
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_user = $request->id_user;
        $id_artist = $request->id_artist;
        $user = User::where('id', $id_user)->first();
        $artist = User::where('id', $id_artist)->first();
        if (User::where('id', $id_user)->exists() && $user->isUserActive() && $artist && $artist->isUserActive()) {
            $likeSongExists = FollowArtist::where('id_user', $id_user)->where('id_artist', $id_artist)->exists();
            if ($likeSongExists) {

                FollowArtist::where('id_user', $id_user)->where('id_artist', $id_artist)->delete();
                $artist->total_followers = $artist->total_followers - 1;
                $artist->save();
                return response()->json([
                    'isFollowing' => false
                ], 200);
            } else {
                FollowArtist::create(['id_user' => $id_user, 'id_artist' => $id_artist]);
                $artist->total_followers = $artist->total_followers + 1;
                $artist->save();
                return response()->json([
                    'isFollowing' => true
                ], 200);
            }
        }
        return response()->json([], 503);
    }

    public function addPlayList(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required',
            'name_playlist' => 'required',
            'is_public' => 'required'
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_user = $request->id_user;
        $name_playlist = $request->name_playlist;
        $is_public = $request->is_public;
        if($is_public =="true"){
            $is_public = 1;
        }else{
            $is_public = 0;

        }
        $user = User::where(['id' => $id_user])->first();

        if ($user && $user->isUserActive()) {
            $currentTimestamp = now()->timestamp;
            $randomString = strval($currentTimestamp);
            Playlist::create(['id_user' => $id_user, 'title' => $name_playlist,'slug'=>$randomString,'status'=>$is_public]);
            $playList = User::find($id_user)->playLists()->select('id','title','slug','id_user')->orderByDesc('created_at')->first();
            return response()->json([
                $playList,
                
            ], 200);
        }
        return response()->json([], 503);
    }
    public function deletePlayList(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required',
            'id_playlist' => 'required',
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_user = $request->id_user;
        $id_playlist = $request->id_playlist;

        $user = User::where(['id' => $id_user])->first();
        $playList = Playlist::where(['id' => $id_playlist])->where(['id_user' => $id_user])->first();
        if ($user && $user->isUserActive() && $playList) {
            $playList->delete();
            return response()->json([], 204);
        }
        return response()->json([], 503);
    }

    public function getSongById(Request $request){
        $validator = $request->validate([
            'idSong' => 'required',
            
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_song = $request->idSong;
        $song = Song::where('id',$id_song)->first();
        if($song && $song->isActive()){
            return response()->json([
                'id_song'=>$song->id,
                'name'=>$song->name,
                'id_artist'=>$song->id_user,
                'name_artist'=>$song->user->name,
                'duration'=>$song->duration,
                'thumbnail'=>$song->thumbnail,
                'source'=>$song->getSource(),
                'slug'=>$song->slug,
                'slug_artist'=>$song->user->slug


            ],200);
        }
        return response()->json([],503);
    }

    public function addSongToPlayList(Request $request){
        $validator = $request->validate([
            'idSong' => 'required',
            'idPlayList' => 'required',
            'idUser' => 'required'
            
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_user = $request->idUser;
        $id_playlist = $request->idPlayList;
        $id_song = $request->idSong;

        $user = User::where('id',$id_user)->first();

        $song = Song::where('id',$id_song)->first();
        $playlist = Playlist::where('id',$id_playlist)->first();
     
        if($song && $song->isActive() && $user && $user->isUserActive() && $playlist){
            $check = DetailPlaylist::where('id_playlist',$id_playlist)->where('id_song',$id_song)->exists();
            if($check){
                return response()->json([
                    'error' => 'Not Found',
                    'message' => 'Bài hát đã có trong playlist'
                ],503);
            }else{
                DetailPlaylist::create(['id_playlist'=>$id_playlist,'id_song'=>$id_song]);
                return response()->json([],204);
            }
        }
        return response()->json([],503);
    }

    public function getSongByArtist(Request $request){
        $validator = $request->validate([
            'idArtist' => 'required', 
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_artist = $request->idArtist;
        

        $user = User::where('id',$id_artist)->first();
        
        
        if($user && $user->isUserActive()){
            $listSong = $user->songs->where('status',true);
            
            return SongResource::collection($listSong);
        }
        return response()->json([],503);
    }

    public function upListensSong(Request $request){
        $validator = $request->validate([
            'idSong' => 'required', 
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_song = $request->idSong;
        $song = Song::where('id',$id_song)->first();

        if($song && $song->isActive()){
            $song->total_listen = $song->total_listen +1;
            $song->save();

            if($request->has('idUser')){
                $id_user = $request->idUser;
                $user = User::where('id',$id_user)->first();
                if($user && $user->isUserActive()){
                    SongListenerHistory::create(['id_user' => $id_user,'id_song'=>$id_song]);
                }
                
            }
            return response()->json([],204);
        }
            return response()->json([],503);

    }
}
