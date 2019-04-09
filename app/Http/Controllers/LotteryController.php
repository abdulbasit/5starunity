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
        $checkTotalCredit = Vallet::where('user_id',$user_id)->where('available_balance','>','0')->sum('available_balance');
        if($checkTotalCredit>$amount)
        {
            $getTCreditList = Vallet::where('user_id',$user_id)->where('available_balance','>','0')->orderBy('available_balance','asc')->get();
            $totalBalance = 0;

            foreach($getTCreditList as $balance)
            {
                if($balance->available_balance > $amount)
                {
                    echo $balance->available_balance."<br />";
                }
                // echo $amount;
            }
        }
        else
        {
            return "Insufficiant Balance";
        }


        // if($amount>$totalBalance
    }
    public function kalarna()
    {
        require(base_path() . '/vendor/autoload.php');
        $merchantId = getenv('USERNAME') ?: 'PK08452_e7d971b33f20';
        $sharedSecret = getenv('PASSWORD') ?: 'zJZvHMidbFnoqr1n';
        $authorizationToken = getenv('AUTH_TOKEN') ?: 'authorizationToken';

        $apiEndpoint = Transport\ConnectorInterface::EU_TEST_BASE_URL;

        $connector = Klarna\Rest\Transport\Connector::create(
            $merchantId,
            $sharedSecret,
            $apiEndpoint
        );
    }
}
