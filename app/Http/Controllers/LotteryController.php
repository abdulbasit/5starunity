<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lottery;
use App\Models\Product;
use App\Models\LotteryContestent;
use App\Models\UserDocument;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Vallet;
use App\Models\Category;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Testimonial;
use function GuzzleHttp\json_encode;

class LotteryController extends Controller
{

    public function __construct()
    {

        // $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $lotteryData = Lottery::with(['lottery_contestent'])
                        ->select('lotteries.*','lotteries.id as lotteryId','lottery_contestents.*',
                                'lottery_contestents.id as contestentsId','lotteries.total_lots as created_lots')
                        ->selectRaw('COUNT(lottery_contestents.lottery_id) as totalClients')
                        ->leftjoin('lottery_contestents','lotteries.id','lottery_id')
                        ->groupBy('lotteries.id','lottery_contestents.lottery_id')
                        ->orderBy('totalClients','desc')
                        ->paginate(18);
        $category = Category::where('category_for','pro')->get();
        $testimonialData = Testimonial::orderBy('id', 'DESC')->get();
        return view('lotteries.index',compact('lotteryData','testimonialData','category'));
    }
    public function detail($id)
    {
        $user = '';
        if (Auth::guard('client')->check()){
            $user = Auth::guard('client');
        }
        Session::flash('route', 'lottery/detail/'.$id);
        $lotteryData = Lottery::find($id);
        $lotteryData->views=$lotteryData->views+1;
        $lotteryData->save();
        return view('lotteries.detail',compact('lotteryData','user'));
    }
    public function purchaseLottery(Request $request)
    {
        $qty = $request->get('qty');
        $user_id = Auth::guard('client')->user()->id;
        $amount = $request->get('amount');
        $total_lots = $request->get('total_lots');

        $lottery_id = $request->lottery_id;

        if($qty > $total_lots)
            return $response = json_encode(array("status"=>"error","message"=>"Lots must be less than".$total_lots));

        $checkTotalCredit = Vallet::where('user_id',$user_id)->orderBy('id','desc')->first();
        if($checkTotalCredit && $checkTotalCredit->total_available_balance >= $amount)
        {
            $remainingTotalBalance = $checkTotalCredit->total_available_balance-$amount;
            $balance = "-".$amount;
            $previousBalance = $checkTotalCredit->total_available_balance;
            $vallet_id = Vallet::create([
                "user_id" => $user_id,
                "credit"=>'0.00',
                "balance"=>$balance.".00",
                "pre_balance"=> $previousBalance,
                "total_available_balance"=>$remainingTotalBalance,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
                "status"=>"approved"
            ]);
        }
        else
        {
            return $response = json_encode(array("status"=>"error","message"=>"Insufficiant Balance!"));
        }
        $i=1;
        $numbers = '';
        $a = array("red");
        for($i=1;$i<=$qty;$i++)
        {
            $lot_number = (rand(10000,1000));
            $numbers.=$lot_number.",";
            LotteryContestent::create([
                "lottery_id" =>$lottery_id,
                "user_id"=>$user_id,
                "lot_number"=>$lot_number,
                "status"=> '0',
                "vallet_id"=>$vallet_id->id,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            $lot_number="";
        }
        return $response = json_encode(array("status"=>"success","message"=>"Successfull",'numbers'=>rtrim($numbers,",")));
    }
    public function userPurchasedLotteries()
    {
        $user_id = Auth::guard('client')->user()->id;
        $lotteryData = LotteryContestent::where('lottery_contestents.user_id',$user_id)
                                        ->select('lottery_contestents.*','vallets.*')
                                        ->leftjoin('vallets','vallets.id','lottery_contestents.vallet_id')
                                        ->groupBy('lottery_id')
                                        ->selectRaw('COUNT(vallets.balance) as totalBalance')
                                        ->get();
        $route='lotteries';
        $userData = User::where('users.id',$user_id)->first();
        $userDocuments = UserDocument::where('user_id',$user_id)->get();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$user_id)->first();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $userData = User::where('users.id',$user_id)->first();
        return view('wallet.lotteries',compact('lotteryData','userData','userInfo','route'));
    }
    public function search(Request $request)
    {
        $categoryID = $request->post('category');
        $searchString = $request->post('search');
        DB::enableQueryLog(); // Enable query log
        $lotteryData = Lottery::with(['lottery_contestent','product'])
                            ->select('lotteries.*','lotteries.id as lotteryId','lottery_contestents.*',
                                    'lottery_contestents.id as contestentsId','lotteries.total_lots as created_lots',"products.*")
                            ->selectRaw('COUNT(lottery_contestents.lottery_id) as totalClients')
                            ->leftjoin('lottery_contestents','lotteries.id','lottery_id')
                            ->leftjoin('products','products.id','lotteries.pro_id')
                            ->groupBy('lotteries.id','lottery_contestents.lottery_id')
                            ->orderBy('totalClients','desc');
        if($categoryID!="")
        {
            $lotteryData = $lotteryData->where('products.cat_id',"=",$categoryID);
        }
        if($searchString!="")
        {
        
            $lotteryData = $lotteryData->where('lotteries.name',"like","%$searchString%");
        }
        $lotteryData = $lotteryData->paginate(18);
        $category = Category::where('category_for','pro')->get();
        $testimonialData = Testimonial::orderBy('id', 'DESC')->get();
        return view('lotteries.index',compact('lotteryData','testimonialData','category'));
    }
}
