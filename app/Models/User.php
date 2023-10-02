<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $keyType = 'string';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'avatar',
        'username',
        'password',
        'banner',
        'role',
        'status',
        'is_celeb',
        'slug',
        'total_followers'
    ];
    

    
    public function songs()
    {
        return $this->hasMany(Song::class, 'id_user', 'id');
    }
    
    public function getListSong()
    {
        return $this->hasMany(Song::class, 'id_user', 'id')->where('status', 1);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'id_user', 'id');
    }

    public function likeSongs()
    {
        return $this->hasMany(LikeSong::class, 'id_user', 'id');
    }
    public function likePlaylists()
    {
        return $this->hasMany(LikePlaylist::class, 'id_user', 'id');
    }

    public function followArtists()
    {
        return $this->hasMany(FollowArtist::class, 'id_user', 'id');
    }

    public function checkFollowArtists($idArtist){
        $isFollowing = $this->followArtists()->where('id_artist', $idArtist)->exists();
        return $isFollowing;
    }

    public function songListenerHistorys(){
        return $this->hasMany(SongListenerHistory::class, 'id_user', 'id');
    }

    public function searchHistorys(){
        return $this->hasMany(SearchHistory::class, 'id_user', 'id');
    }


    public function isAdmin()
    {
        return $this->role == 'admin';
    }
    
    public function isUserActive()
    {
        if($this->role=='user'&&$this->status==1){
            return true;
        }
        return false;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
}
