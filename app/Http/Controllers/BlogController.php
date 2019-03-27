<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use App\Models\Blog;
use App\Models\BlogComment;
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
        $blogData = Blog::select('id','title','short_desc','post_img','created_at','post_name')
        ->orderBy('blogs.id', 'DESC')
        ->paginate(12);
        return view('blog.index',compact('blogData'));
    }
    public function blogDetail($slug)
    {
        $id = explode("-",$slug);
        $offest = count($id)-1;
        $id = $id[$offest];
        $blogPostData = Blog::with('blog_comments')->find($id);
        return view('blog.detail',compact('blogPostData'));
    }
}
