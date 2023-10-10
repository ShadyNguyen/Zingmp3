<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FollowArtist;
use App\Models\LikeSong;
use App\Models\SongListenerHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin',['except' => ['dashboard']]);
        // $this->middleware('nv');
    }
    public function dashboard()
    {
        // Lấy ngày đầu và ngày cuối của tháng hiện tại
        $firstDayOfMonth = now()->startOfMonth();
        $lastDayOfMonth = now()->endOfMonth();

        // Lấy ngày đầu và ngày cuối của tháng trước
        $firstDayOfLastMonth = now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = now()->subMonth()->endOfMonth();

        //Lấy tổng số lượt like của 2 tháng gần đây
        $likesCountLastMonth = $this->getTotalCountByMonth(LikeSong::class,$firstDayOfLastMonth,$lastDayOfLastMonth);
        $likesCountOfMonth = $this->getTotalCountByMonth(LikeSong::class,$firstDayOfMonth,$lastDayOfMonth);

        //Lấy tổng số lượt follow của 2 tháng gần đây
        $followCountLastMonth = $this->getTotalCountByMonth(FollowArtist::class,$firstDayOfLastMonth,$lastDayOfLastMonth);
        $followCountOfMonth = $this->getTotalCountByMonth(FollowArtist::class,$firstDayOfMonth,$lastDayOfMonth);

        //Lấy tổng số lượt nge của 2 tháng gần đây
        $listenCountLastMonth = $this->getTotalCountByMonth(SongListenerHistory::class,$firstDayOfLastMonth,$lastDayOfLastMonth);
        $listenCountOfMonth = $this->getTotalCountByMonth(SongListenerHistory::class,$firstDayOfMonth,$lastDayOfMonth);

        //Lấy tổng số user đăng ký của 2 tháng gần đây
        $userCountLastMonth = $this->getTotalCountByMonth(User::class,$firstDayOfLastMonth,$lastDayOfLastMonth);
        $userCountOfMonth = $this->getTotalCountByMonth(User::class,$firstDayOfMonth,$lastDayOfMonth);

        //Tổng số lượt nge
        $listenCount = SongListenerHistory::count();
        $anonymousListening = SongListenerHistory::where('id_user',null)->count();

        $arrayListen = [$anonymousListening,$listenCount-$anonymousListening];
        
        return view('pages.admin.dashboard', compact(
            'likesCountLastMonth',
            'likesCountOfMonth',
            'followCountLastMonth',
            'followCountOfMonth',
            'listenCountLastMonth',
            'listenCountOfMonth',
            'userCountLastMonth',
            'userCountOfMonth',
            'arrayListen'
        ));
    }
    public function onlyAdmin()
    {
        return 'onlyAdmin';
    }

    public function user(){
        return view('pages.admin.user');
    }
    function getTotalCountByMonth($model, $firstDayOfLastMonth, $lastDayOfLastMonth)
    {
        $count = $model::whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->count();
        return $count;
    }
}
