<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_playlist extends Model
{
    use HasFactory;
    protected $table = 'detail_playlists';
    protected $fillable = ['id_playlist','id_song','order_index'];

    public function playlist()
    {
        return $this->hasOne(Playlist::class, 'id', 'id_playlist');
    }

    public function song()
    {
        return $this->hasOne(Song::class, 'id', 'id_song');
    }
}
