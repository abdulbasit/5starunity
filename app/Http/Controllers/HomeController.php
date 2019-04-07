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
class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $lotteryData = Lottery::with('product','lottery_contestent')->limit('3')->get();
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

    }
    public function partner()
    {

    }
    public function howitworks()
    {

    }
    public function inventroAcadmy()
    {

    }
    public function aboutUs()
    {

    }
    public function mediaInfo()
    {

    }
    public function contactUs()
    {
        return view('pages.contactus');
    }
}
