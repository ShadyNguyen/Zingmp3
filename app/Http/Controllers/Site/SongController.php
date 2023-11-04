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
use App\Models\LikePlaylist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if ($is_public == "true") {
            $is_public = 1;
        } else {
            $is_public = 0;
        }
        $user = User::where(['id' => $id_user])->first();

        if ($user && $user->isUserActive()) {
            $currentTimestamp = now()->timestamp;
            $randomString = strval($currentTimestamp) . '-' . $name_playlist;
            Playlist::create(['id_user' => $id_user, 'title' => $name_playlist, 'slug' => $randomString, 'status' => $is_public]);
            $playList = User::find($id_user)->playLists()->select('id', 'title', 'slug', 'id_user')->orderByDesc('created_at')->first();
            return response()->json([
                $playList,

            ], 200);
        }
        return response()->json([], 503);
    }

    public function editPlayList(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required||exists:users,id',
            'id_playlist' => 'required||exists:play_lists,id',
            'newName' => 'required',
            'newStatus' => 'required',
        ], [
            'required' => 'Nhập thiếu thông tin!',
            'exists' => 'Sai thông tin!',

        ]);
        $id_user = $request->id_user;
        $id_playlist = $request->id_playlist;
        $newName = $request->newName;
        $newStatus = $request->newStatus == 'true' ? 1 : 0;

        $user = User::where(['id' => $id_user])->first();
        $playlist = Playlist::where('id', $id_playlist)->where('id_user', $id_user)->first();
        if ($user->isUserActive()) {
            $playlist->title = $newName;
            $playlist->status = $newStatus;
            $playlist->save();
            return response()->json([], 204);
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
    public function likePlayList(Request $request)
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
            if ($user->checkLikePlaylists($playList->id)) {
                $likePlayList = LikePlaylist::where(['id_user' => $id_user, 'id_playlist' => $id_playlist]);
                $likePlayList->delete();
                $playList->total_like = $playList->total_like - 1;
            } else {
                $playList->total_like = $playList->total_like + 1;
                LikePlaylist::create(['id_user' => $id_user, 'id_playlist' => $id_playlist]);
            }
            $playList->save();

            return response()->json([
                'isLike' => $user->checkLikePlaylists($playList->id)
            ], 200);
        }
        return response()->json([], 503);
    }

    public function getSongById(Request $request)
    {
        $validator = $request->validate([
            'idSong' => 'required',

        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_song = $request->idSong;
        $song = Song::where('id', $id_song)->first();
        if ($song && $song->isActive()) {
            return response()->json([
                'id_song' => $song->id,
                'name' => $song->name,
                'id_artist' => $song->id_user,
                'name_artist' => $song->user->name,
                'duration' => $song->duration,
                'thumbnail' => $song->thumbnail,
                'slug' => $song->slug,
                'slug_artist' => $song->user->slug
            ], 200);
        }
        return response()->json([], 503);
    }
    function getSourceById(Request $request)
    {
        $validator = $request->validate([
            'idSong' => 'required',

        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_song = $request->idSong;
        $song = Song::where('id', $id_song)->first();
        if ($song && $song->isActive()) {
            return response()->json([
                'source' => $song->getSource()
            ], 200);
        }
        return response()->json([], 503);
    }

    public function addSongToPlayList(Request $request)
    {
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

        $user = User::where('id', $id_user)->first();

        $song = Song::where('id', $id_song)->first();
        $playlist = Playlist::where('id', $id_playlist)->first();

        if ($song && $song->isActive() && $user && $user->isUserActive() && $playlist) {
            $check = DetailPlaylist::where('id_playlist', $id_playlist)->where('id_song', $id_song)->exists();
            if ($check) {
                return response()->json([
                    'error' => 'Not Found',
                    'message' => 'Bài hát đã có trong playlist'
                ], 503);
            } else {
                DetailPlaylist::create(['id_playlist' => $id_playlist, 'id_song' => $id_song]);
                return response()->json([], 204);
            }
        }
        return response()->json([], 503);
    }

    public function deleteSongFromPlayList(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required||exists:users,id',
            'id_playlist' => 'required||exists:play_lists,id',
            'id_song' => 'required||exists:songs,id'

        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_user = $request->id_user;
        $id_playlist = $request->id_playlist;
        $id_song = $request->id_song;

        $user = User::where(['id' => $id_user])->first();
        $playlist = Playlist::where('id', $id_playlist)->where('id_user', $id_user)->first();
        $detail = DetailPlaylist::where('id_playlist', $playlist->id)->where('id_song', $id_song)->first();

        if ($detail && $user->isUserActive()) {
            DB::table('detail_playlists')
                ->where('id_playlist', $id_playlist) // Thay $id_playlist bằng giá trị bạn muốn
                ->where('id_song', $id_song) // Thay $id_song bằng giá trị bạn muốn
                ->delete();
            return response()->json([], 204);
        }
        return response()->json([], 503);
    }

    public function getSongByArtist(Request $request)
    {
        $validator = $request->validate([
            'idArtist' => 'required',
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_artist = $request->idArtist;


        $user = User::where('id', $id_artist)->first();


        if ($user && $user->isUserActive()) {
            $listSong = $user->songs->where('status', true);

            return SongResource::collection($listSong);
        }
        return response()->json([], 503);
    }

    public function getSongByPlaylist(Request $request)
    {
        $validator = $request->validate([
            'id_playlist' => 'required',
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_playlist = $request->id_playlist;


        $playlist = Playlist::where('id', $id_playlist)->first();



        if ($playlist) {
            $listSong = $playlist->songs->where('status', true);

            return SongResource::collection($listSong);
        }
        return response()->json([], 503);
    }

    public function upListensSong(Request $request)
    {
        $validator = $request->validate([
            'idSong' => 'required',
        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $id_song = $request->idSong;
        $song = Song::where('id', $id_song)->first();

        if ($song && $song->isActive()) {
            $song->total_listen = $song->total_listen + 1;
            $song->save();

            if ($request->has('idUser')) {
                $id_user = $request->idUser;
                $user = User::where('id', $id_user)->first();
                if ($user && $user->isUserActive()) {
                    SongListenerHistory::create(['id_user' => $id_user, 'id_song' => $id_song]);
                }
            } else {
                SongListenerHistory::create(['id_song' => $id_song]);
            }
            return response()->json([], 204);
        }
        return response()->json([], 503);
    }
    public function adminTableUser(Request $request)
    {
        $quantityRsUser = 20;
        $listUser = User::where('role', 'user');
        if ($request->has('name')) {
            $listUser = $listUser->where('name', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->has('status')) {
            $listUser = $listUser->where('status', $request->get('status'));
        }
        if ($request->has('sortFolower')) {
            if ($request->get('sortFolower')) {
                $listUser = $listUser->orderBy('total_followers', 'desc');
            } else {
                $listUser = $listUser->orderBy('total_followers', 'asc');
            }
        }
        $listUser = $listUser->paginate($quantityRsUser);
        return view('pages.admin.user.tableUser', compact('listUser'));
    }
    function adminToggleStatusUser(Request $request)
    {

        $validator = $request->validate([
            'id_user' => 'required',
            'id' => 'required',
            'show' => 'required'

        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        $check  = $this->checkUserAdmin($request->get('id_user'));

        if ($check) {
            $checkUser = User::where('id', $request->get('id'))->exists();

            if ($checkUser) {

                $user = User::find($request->get('id'));
                $user->status = $request->get('show');
                $user->save();
                return response()->json([$user->status], 200);
            }
        }
        return response()->json([], 503);
    }
    function checkUserAdmin($id_user)
    {



        $user = User::find($id_user);

        if ($user && in_array($user->role, ['admin', 'nv']) && $user->status) {
            return true;
        }
        return false;
    }
    public function detailUser(Request $request)
    {
        $quantityRsUser = 1;
        $validator = $request->validate([
            'id_admin' => 'required',
            'id_user' => 'required',
            'type' => 'required',

        ], [
            'required' => 'Nhập thiếu thông tin!'
        ]);
        
        
        $checkUserAdmin  = $this->checkUserAdmin($request->get('id_admin'));
        $user = User::find($request->get('id_user'));
        
        if ($checkUserAdmin && $user) {
            $type = $request->get('type');
            switch ($type) {
                case 'followings':             
                    $listUser = $user->followArtists()->paginate($quantityRsUser);
                    $type = 'followings';            
                    return view('pages.admin.user.listUser', compact('listUser','type'));
                case 'followers':
                    $listUser = $user->followers()->paginate($quantityRsUser);
                    $type = 'followers';            
                    return view('pages.admin.user.listUser', compact('listUser','type'));
                default:
                    return response()->json([], 503);
            }
        }
        return response()->json([], 503);
    }
    public function getTest(Request $request){
        $id = $request->get('id');
        $user = User::find($id);
        $newList = $user->followers;
        $type = 'followers';
        return $newList[0]->getTest('jj');
    }
}
