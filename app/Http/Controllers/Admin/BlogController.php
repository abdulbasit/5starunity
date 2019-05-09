<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BlogUpdateCounter;
use App\Models\Blog;
use Image;
use Carbon\Carbon;
use Auth;
use DB;
class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('admin.blog.index',compact('blogs'));
    }
    public function edit($id)
    {
        $category = Category::all();
        $blog = Blog::find($id);
        // dd($blog->title);
        return view('admin.blog.edit_blog',compact('blog','category'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.blog.create_blog',compact('category'));
    }
    public function category()
    {
        $category = Category::where("category_for",'blog')->get();
        return view('admin.blog.category',compact('category'));
    }
    public function delete($id)
    {
        $blogPost = Blog::where('id',$id);
        $blogPost->delete();
        return redirect('admin/blog');
    }
    public function updateBlog($id,Request $request)
    {
        ini_set('memory_limit', '100192M');
        ini_set("post_max_size","6G");
        ini_set("upload_max_filesize","4G");
        $file = $request->file('image');
        // $pdo->query("SET wait_timeout=1200;");
         ini_set('wait_timeout', '12000');
         ini_set('memory_limit', '100192M');
        $blogPost = Blog::find($id);
        $blog_counter = BlogUpdateCounter::create([
            "blog_id"=>$id
        ]);
        $file = $request->file('image');
        if ($file!="") {
            $destinationPath = public_path('uploads/blog/');
            $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $imageName);
            $blogPost->post_img = $imageName;
        }
            $blogPost->title=$request->get("title");
            $blogPost->description=$request->get("desc");
            $blogPost->seo_title = $request->get('mtitle');
            $blogPost->seo_meta = $request->get('mtags');
            $blogPost->seo_meta_des = $request->get('mdesc');
            $blogPost->cat_id = $request->get('category');
            $blogPost->status = $request->get("status");
            $blogPost->short_desc = $request->get('short_desc');
            $blogPost->allow_cooments = "0";
            // $blogPost->post_author"=>Auth::guard('admin')->user()->id,
            $blogPost->post_name = str_replace(" ","-", strtolower($request->get("mtitle")));
            $blogPost->save();
            return redirect('admin/blog');
    }
    public function saveBlog(Request $request)
    {
        ini_set('memory_limit', '100192M');
        ini_set("post_max_size","10024M");
        ini_set("upload_max_filesize","20024M");
        $file = $request->file('image');
        $destinationPath = public_path('uploads/blog/');
        $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $imageName);

        $lottery_id = Blog::create([
            "title" => $request->get("title"),
            "description"=>$request->get("desc"),
            "seo_title"=>$request->get('mtitle'),
            "seo_meta"=>$request->get('mtags'),
            "seo_meta_des"=>$request->get('mdesc'),
            "cat_id"=>$request->get('category'),
            "post_img"=>$imageName,
            "status"=>$request->get("status"),
            "allow_cooments"=>"0",
            "short_desc"=>$request->get("short_desc"),
            "post_author"=>Auth::guard('admin')->user()->id,
            "post_name"=>str_replace(" ","-", strtolower($request->get("mtitle")))
        ]);
        return redirect('admin/blog');
    }
    public function createCategory()
    {
        return view('admin.blog.create_category');
    }
    public function saveCategory(Request $request)
    {
        // dd($request->get("name"));
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));
        $lottery_id = Category::create([
            "name" => $request->get("name"),
            "detail"=>$request->get("desc"),
            "parent_id"=>'0',
            "status"=>$request->get('status'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
            "category_for"=>"blog"
        ]);
        return redirect('admin/blog/category');
    }
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.blog.edit_category',compact('category'));
    }
    public function deleteCategory($id)
    {
        $productImage = Category::where('id',$id);
        $productImage->delete();
        return redirect('admin/blog/category');
    }
    public function updateCategory($id,Request $request)
    {
        $product = Category::find($id);
        $product->name=$request->get("name");
        $product->detail=$request->get("desc");
        $product->status=$request->get("status");
        $product->updated_at=Carbon::now();
        $product->save();
        return redirect('admin/blog/category');
    }
}
