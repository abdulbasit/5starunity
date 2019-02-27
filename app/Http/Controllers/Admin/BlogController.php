<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Image;
use Carbon\Carbon;
use Auth;
class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('admin.blog.index',compact('blogs'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.blog.create_blog',compact('category'));
    }
    public function category()
    {
        $category = Category::all();
        return view('admin.blog.category',compact('category'));
    }
    public function saveBlog(Request $request)
    {
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
            "post_author"=>Auth::guard('admin')->user()->id,
            "post_name"=>str_replace(" ","-", strtolower($request->get("mtitle")))
        ]);
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
    public function edit($id)
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
