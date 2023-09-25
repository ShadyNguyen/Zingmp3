<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeSong extends Model
{
    use HasFactory;
    protected $table = 'like_songs';
    protected $fillable = ['id_user','id_song'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function song()
    {
        return $this->hasOne(Song::class, 'id', 'id_song');
    }
}
