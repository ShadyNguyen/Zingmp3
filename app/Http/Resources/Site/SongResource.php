<?php

namespace App\Http\Resources\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_song'=>$this->id,
            'name'=>$this->name,
            'id_artist'=>$this->id_user,
            'name_artist'=>$this->user->name,
            'duration'=>$this->duration,
            'thumbnail'=>$this->thumbnail,
            'slug'=>$this->slug,
            'slug_artist'=>$this->user->slug
        ];
    }
}
