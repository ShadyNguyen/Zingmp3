<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistoty extends Model
{
    use HasFactory;
    protected $table = 'search_histotys';
    protected $fillable = ['id_user','search_keyword'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
