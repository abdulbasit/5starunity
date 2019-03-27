<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use App\Models\Blog;
use App\Models\Testimonial;
class BlogController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $lotteryData = Lottery::with('product','lottery_contestent')->get();
        $blogData = Blog::select('blogs.id as blog_id','title','short_desc','post_img','blogs.created_at as blog_creted_at')
        ->with('category')
        ->orderBy('blogs.id', 'DESC')
        ->paginate(2);
        // $blogData = Blog::with('category')
        // ->orderBy('blogs.id', 'DESC')
        // ->get();
        $testimonialData = Testimonial::orderBy('id', 'DESC')->get();
        return view('blog.index',compact('lotteryData','blogData','testimonialData'));
    }
}
