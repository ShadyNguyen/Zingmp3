<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongListenerHistory extends Model
{
    use HasFactory;

    protected $table ='song_listener_historys';
    protected $fillable =['id_user','id_song'];

    /**
     * Get the user that owns the SongListenerHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    /**
     * Get the song associated with the SongListenerHistory.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function song()
    {
        return $this->hasOne(Song::class, 'id', 'id_song');
    }
}
