<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProClassification;
use App\Models\Product_images;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($categoryFor)
    {
        $category = Category::where('category_for',$categoryFor)->get();
        return view('admin.categories.index',compact('category','categoryFor'));
    }
    public function addCategory($categoryFor)
    {
        return view('admin.categories.create_category',compact('categoryFor'));
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
            "category_for"=>$request->get('catFro')
        ]);
        return redirect('admin/categories/'.$request->get('catFro'));
    }
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit_category',compact('category'));
    }
    public function delete($id,$type)
    {
        $productImage = Category::where('id',$id);
        $productImage->delete();
        return redirect('admin/categories/'.$type);
    }
    public function updateCategory($id,Request $request)
    {
        $product = Category::find($id);
        $product->name=$request->get("name");
        $product->detail=$request->get("desc");
        $product->status=$request->get("status");
        $product->updated_at=Carbon::now();
        $product->save();
        return redirect('admin/categories/'.$product->category_for);
    }
}
