<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use App\Models\Blog;
use App\Models\Vallet;
use Route;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Testimonial;




class LotteryController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $lotteryData = Lottery::with('product','lottery_contestent')->paginate(18);
        $testimonialData = Testimonial::orderBy('id', 'DESC')->get();
        return view('lotteries.index',compact('lotteryData','testimonialData'));
    }
    public function detail($id)
    {
        Session::flash('route', 'lottery/detail/'.$id);
        $lotteryData = Lottery::find($id);
        return view('lotteries.detail',compact('lotteryData'));
    }
    public function purchaseLottery(Request $request)
    {
        $qty = $request->get('qty');
        $user_id = Auth::guard('client')->user()->id;
        $amount = $request->get('amount');
        $total_lots = $request->get('total_lots');


        if($qty > $total_lots)
            return  "Lots must be less than".$total_lots;

        $checkTotalCredit = Vallet::where('user_id',$user_id)->orderBy('id','desc')->first();



        if($checkTotalCredit->total_available_balance >= $amount)
        {
            $remainingTotalBalance = $checkTotalCredit->total_available_balance-$amount;
            echo $balance = "-".$amount;

            $previousBalance = $checkTotalCredit->total_available_balance;
// DB::enableQueryLog();
            $lottery_id = Vallet::create([
                "user_id" => $user_id,
                "credit"=>'0',
                "balance"=>$balance,
                "pre_balance"=> $previousBalance,
                "total_available_balance"=>$remainingTotalBalance,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
// dd(DB::getQueryLog());

        }
        else
        {
            return "Insufficiant Balance";
        }


        // if($amount>$totalBalance
    }

}
