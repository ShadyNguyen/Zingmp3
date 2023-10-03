<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $table = 'play_lists';
    protected $fillable = ['id_user','status','title','total_like','total_listen','banner','avatar','slug'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function details()
    {
        return $this->hasMany(DetailPlaylist::class, 'id_playlist', 'id');
    }
    public function isActive(){
        return $this->status;
    }
    public function songs()
    {
        return $this->hasManyThrough(
            Song::class, // Model của bài hát
            DetailPlaylist::class, // Model của bảng trung gian
            'id_playlist', // Khóa ngoại trên bảng trung gian
            'id', // Khóa chính trên model hiện tại (Playlist)
            'id', // Khóa chính trên model Song
            'id_song' // Khóa ngoại trên bảng trung gian liên kết với Song
        );
    }

}

