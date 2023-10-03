<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Song extends Component
{
    /**
     * Create a new component instance.
     */
    public $song;
    public $artist;
    public $isLike=false;
    public $stringJs = '';
    public $stringJsAddSongToPlayList='';
    public $isDelete=false;

    public function __construct($song,$isDelete=false)
    {
        
        $this->song = $song;
        if($isDelete=="true"){
            $this->isDelete = true;
        }
        $this->artist = $song->artist;
        if(Auth::guard('user')->check()){
            $id_user = Auth::guard('user')->user()->id;
            $this->stringJs = $id_user."','".$song->id;
            if(Auth::guard('user')->user()->likeSongs->where('id_song', $this->song->id)->first()){
                $this->isLike=true;
            }
            $this->stringJsAddSongToPlayList = "addSongToPlayList('{$id_user}','{$this->song->id}','";
            $this->stringJsAddSongToPlayList = "addSongToPlayList('{$id_user}','{$this->song->id}','')";


        }
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.song');
    }
}
