<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\Product_images;
use App\Models\Category;
use App\Models\Lottery;
use App\Models\Page;
use App\Models\LotteryContestent;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\ContactUs;
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
    public function save_contact_us(Request $request)
    {
        $lottery_id = ContactUs::create([
            "name" => $request->get("name"),
            "email"=>$request->get("email"),
            "phone"=>$request->get('phone'),
            "betreff"=>$request->get('betreff'),
            "msg"=>$request->get('msg'),
            "created_at"=>""
        ]);
        return redirect()->back();
    }
    public function ceo()
    {
        return view('pages.comming_soon');
    }
    public function partner($page)
    { 
        $page = Page::where('page_slug',$page)->first();
        dd($page);
        return view('pages.terms',compact('page'));
    }
    public function howitworks()
    {
        return view('pages.comming_soon');
    }
    public function impresum()
    {
        return view('pages.impresum');
    }
    public function pages($page)
    {
        $pageName=$page;
        $page = Page::where('page_slug',$page)->first();
        return view('pages.terms',compact('page','pageName'));
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
        $category = Category::where('category_for','pro')->get();
        $lotteryData = Lottery::with(['lottery_contestent'])
                                ->select('lotteries.*','lotteries.id as lotteryId','lottery_contestents.*',
                                        'lottery_contestents.id as contestentsId','lotteries.total_lots as created_lots')
                                ->selectRaw('COUNT(lottery_contestents.lottery_id) as totalClients')
                                ->leftjoin('lottery_contestents','lotteries.id','lottery_id')
                                ->groupBy('lotteries.id','lottery_contestents.lottery_id')
                                ->orderBy('totalClients','desc')
                                ->limit(12)
                                ->get();
        return view('pages.lottery_things',compact('lotteryData','category'));
    }
    public function unsubscribe(Request $request)
    {
        $unsbscribe = Subscription::where('email',$request->email)->first();
        if($unsbscribe)
        {
            $unsbscribe->status = 1;
            $unsbscribe->save();
            return redirect('/')->with('success','You are unsubscribed!');
        }
        else{
            return redirect('/')->with('success','You are unsubscribed!');
        }
        
    }
}
