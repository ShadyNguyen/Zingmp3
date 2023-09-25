<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $table = 'play_lists';
    protected $fillable = ['id_user','status','total_like','total_listen','banner','avatar','slug'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function details()
    {
        return $this->hasMany(DetailPlaylist::class, 'id_playlist', 'id');
    }

}

