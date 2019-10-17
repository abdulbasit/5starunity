<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Testimonial;
use Carbon\Carbon;
use Auth;
use Session;
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
            ->paginate(15);
            $categories = Category::where('category_for','blog')->orderBy('name','ASC')->get();
            return view('blog.index',compact('blogData','categories'));
    }
    public function cat_blogs($cat_id)
    {
        $blogData = Blog::select('id','title','short_desc','post_img','created_at','post_name')
        ->where('cat_id',$cat_id)
        ->orderBy('blogs.id', 'DESC')
        ->paginate(15);
        $categories = Category::where('category_for','blog')->orderBy('name','ASC')->get();
        return view('blog.index',compact('blogData','categories','cat_id'));
    }
    public function blogDetail($slug)
    {

        $id = explode("-",$slug);
        $offest = count($id)-1;
        $id = $id[$offest];
        Session::flash('route', 'article/'.$slug);
        $blogPostData = Blog::with('blog_comments','user')->find($id);
        $categories = Category::where('category_for','blog')->get();
        $commentsData = array_reverse(array_sort($blogPostData->blog_comments));

        return view('blog.detail',compact('blogPostData','commentsData','categories'));
    }
    public function post_comment(Request $request)
    {
        $user_id = Auth::guard('client')->user()->id;
        $comment = $request->get('comment');
        $post_id = $request->get('post_id');
        $comment_id = BlogComment::create([
            "user_id" => $user_id,
            "comment"=>$comment,
            'updated_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
            "blog_id"=>$post_id
        ]);

    }
}
