<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
                return $this->historySong($type);
                break;
            case 'playlist':
                return $this->historyPlaylist($type);
                break;
            default:
                return redirect()->route('site.home');
                break;
        }
    }
    public function historySong(string $type){
        $quantityRsHistory = 20;
        $user = Auth::guard('user')->user();
        
        $user = User::find(Auth::guard('user')->user()->id);
        $listHistorySong = $user->songListenerHistorys()->orderBy('created_at' ,'desc')->paginate($quantityRsHistory);
        return view('pages.site.mymusic.historySong',compact('listHistorySong'));
    }
    public function historyPlaylist(string $type){
        dd('chua lam');
    }
    
}
