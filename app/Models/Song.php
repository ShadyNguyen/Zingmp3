<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $keyType = 'string';


    protected $table = 'songs';
    protected $fillabe = ['id_user', 'name', 'duration', 'thumbnail', 'source', 'total_like', 'total_listen', 'status', 'slug', 'key_source'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function likes()
    {
        return $this->hasMany(LikeSong::class, 'id_song', 'id');
    }
    public function songListenerHistorys()
    {
        return $this->hasMany(SongListenerHistory::class, 'id_song', 'id');
    }
    public function isActive()
    {
        return $this->status;
    }
    public function getSource()
    {
        if (!$this->key_source) {
            return null;
        }

        try {
            // Tạo một đối tượng HTTP Client
            $client = new Client();

            // Gửi yêu cầu GET đến đường link của key_source
            $response = $client->get("https://mp3.zing.vn/xhr/media/get-source?type=audio&key=".$this->key_source);

            // Kiểm tra xem yêu cầu có thành công không
            if ($response->getStatusCode() === 200) {
                // Lấy dữ liệu từ phản hồi
                $sourceJson = $response->getBody()->getContents();

                // Giải mã dữ liệu JSON
                $sourceData = json_decode($sourceJson, true);

                // Lấy URL của nguồn âm thanh với chất lượng 128
                if (isset($sourceData['data']['source']['128'])) {
                    return $sourceData['data']['source']['128'];
                } else {
                    return null; // Không tìm thấy URL nguồn âm thanh 128
                }
            } else {
                // Xử lý trường hợp yêu cầu thất bại
                return null;
            }
        } catch (\Exception $e) {
            // Xử lý bất kỳ lỗi nào nếu có
            return null;
        }
    }
    public function getThumnail($size){
        $sizeSting = ".zmdcdn.me/w".$size;
        return str_replace(".zmdcdn.me/w94",$sizeSting , $this->thumbnail);
    }
}
