<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ListArtist extends Component
{
    /**
     * Create a new component instance.
     * 
     */
    public $listArtists;
    public $title;
    public $isFollowed;
    public $user=null;
   



    public function __construct($listArtists,$title)
    {
        //
        $this->listArtists = $listArtists;
        $this->title = $title;
        if (Auth::guard('user')->check()) {
            $this->user=Auth::guard('user')->user();
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list-artist');
    }
}
