<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ListAlbum extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $listAlbum;
    public $type;
    public $check=true;
    public $addAlbum;


    public function __construct($title,$listAlbum,$type='default',$addAlbum=false)
    {
        //
        
        $this->title = $title;
        $this->listAlbum = $listAlbum;
        $this->type = $type;
        if ($this->type != 'default' and Auth::guard('user')->check()){
            $this->check= false;
        }
        $this->addAlbum = $addAlbum;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list-album');
    }
}
