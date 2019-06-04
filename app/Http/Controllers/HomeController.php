<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Slider;
use DB;
class HomeController extends Controller
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
                            ->limit(3)
                            ->get();
        $sliderData = Slider::all();
        $blogData = Blog::select('id','title','short_desc','post_img','created_at','post_name')
        ->orderBy('blogs.id', 'DESC')
        ->limit('6')
        ->get();
        $testimonialData = Testimonial::orderBy('id', 'DESC')->limit('3')->get();
        return view('welcome',compact('lotteryData','blogData','testimonialData','sliderData'));
    }
    public function ceo()
    {
        return view('pages.comming_soon');
    }
    public function partner()
    {
        return view('pages.comming_soon');
    }
    public function howitworks()
    {
        return view('pages.comming_soon');
    }
    public function termsCond()
    {
        return view('pages.terms_cond');
    }
    public function inventroAcadmy()
    {
        return view('pages.comming_soon');
    }
    public function aboutUs()
    {
        return view('pages.comming_soon');
    }
    public function mediaInfo()
    {
        return view('pages.comming_soon');
    }
    public function contactUs()
    {
        return view('pages.contactus');
    }
    public function lotteryThings()
    {
        DB::enableQueryLog();
        $lotteryData = Lottery::with(['lottery_contestent'])
                            ->select('lotteries.*','lotteries.id as lotteryId','lottery_contestents.*',
                                     'lottery_contestents.id as contestentsId','lotteries.total_lots as created_lots')
                            ->selectRaw('COUNT(lottery_contestents.lottery_id) as totalClients')
                            ->leftjoin('lottery_contestents','lotteries.id','lottery_id')
                            ->groupBy('lotteries.id','lottery_contestents.lottery_id')
                            ->orderBy('totalClients','desc')
                            ->limit(12)
                            ->get();
        // dd(DB::getQueryLog());
        // dd($lotteryData);
        return view('pages.lottery_things',compact('lotteryData'));
    }
}
