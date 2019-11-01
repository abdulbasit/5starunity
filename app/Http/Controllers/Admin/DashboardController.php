<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Lottery;
use App\Models\User;
use App\Models\LotteryContestent;
use Auth;
use DB;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public function index()
    {
        dd(Auth::user());
        $date = Carbon::today()->subDays(15); // last 15 days lotteries 
        $totalUsers = User::count();
        $Ttallotteries = LotteryContestent::where('created_at', '>=', $date)->count();
        $lotteries =  Lottery::with(['lottery_contestent'])
                                ->select('lotteries.*','lotteries.id as lotteryId','lottery_contestents.*',
                                        'lottery_contestents.id as contestentsId','lotteries.total_lots as created_lots')
                                ->selectRaw('COUNT(lottery_contestents.lottery_id) as totalClients')
                                ->join('lottery_contestents','lotteries.id','lottery_id')
                                ->groupBy('lotteries.id','lottery_contestents.lottery_id')
                                ->orderBy('totalClients','desc')
                                ->paginate(18);
        $latestRegisterdUser = User::orderBy('id','desc')->paginate(10);
        $products = Product::count();
        return view('admin.dashboard',compact('totalUsers','Ttallotteries','products','lotteries','latestRegisterdUser'));
    }
}
