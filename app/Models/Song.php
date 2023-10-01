<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $keyType = 'string';


    protected $table ='songs';
    protected $fillabe = ['id_user','name','duration','thumbnail','source','total_like','total_listen','status','slug'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function likes()
    {
        return $this->hasMany(LikeSong::class, 'id_song', 'id');
    }
    public function songListenerHistorys(){
        return $this->hasMany(SongListenerHistory::class, 'id_song', 'id');
    }
    public function isActive(){
        return $this->status;
    }
}
