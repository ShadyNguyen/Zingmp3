<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePlaylist extends Model
{
    use HasFactory;

    protected $table = 'like_playlists';
    protected $fillable = ['id_user','id_playlist'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function play_list()
    {
        return $this->hasOne(Playlist::class, 'id', 'id_playlist');
    }
}
