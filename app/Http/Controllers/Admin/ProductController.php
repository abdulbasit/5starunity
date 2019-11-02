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
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $this->authorize('list', new Product);
        $products= Product::join('categories','cat_id','categories.id')->get();
        return view('admin.products.index',compact('products'));
    }
    public function create()
    {
        $this->authorize('add', new Product);
        $category = Category::where("category_for",'pro')->get();
        return view('admin.products.create',compact('category'));
    }
    public function edit($id)
    {
        // dd($id);
        // $this->authorize('edit', new Product);
        $category = Category::where("category_for",'pro')->get();
        $productInfo = Product::where("id",$id)->first();
        dd($productInfo);
        $productImgs = Product_images::where('pro_id',$id)->get();
        return view('admin.products.edit',compact('productInfo','productImgs','category'));
    }
    public function deletePhoto(Request $request)
    {
        $this->authorize('delete', new Product);
        $productImage = Product_images::where('id',$request->get('id'));
        $productImage->delete();
    }
    public function delete($id)
    {
        $this->authorize('delete', new Product);
        $productImage = Product::where('id',$id);
        $productImage->delete();
        return redirect('admin/products');
    }
    public function update($id,Request $request)
    {
        $this->authorize('edit', new Product);
        $product = Product::find($id);
        $product->pro_name=$request->get("name");
        $product->pro_detail=$request->get("desc");
        $product->pro_status=$request->get("status");
        $product->pro_price=$request->get("price");
        $product->updated_at=Carbon::now();
        $product->pro_class=$request->get('class_id');
        $product->cat_id=$request->get('category');
        $product->save();

        $data = $request->all();
        $file = $request->file('images');
        if(!empty($file))
        {
            $i=0;
            $thumbnailPath = public_path('uploads/pro_thumbnail/');
            $destinationPath  = public_path('uploads/pro_images/');
            foreach ($file as $image) {
                $i++;
                $image->getClientOriginalName();
                $image->getClientOriginalExtension();
                $image->getRealPath();
                $image->getSize();
                $image->getMimeType();
                $imageName = time().$i.'_5starunity.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);

                $product_images = Product_images::create([
                    "pro_id" =>$id,
                    "pro_image"=>$imageName,
                    "created_at"=>Carbon::now(),
                    "updated_at"=>Carbon::now()
                ]);
            }
        }
        return redirect('admin/products');
    }
    public function documents()
    {
        return view('admin.products.documents');
    }
    public function createCategories()
    {
        return view('admin.products.create_category');
    }
    public function categories()
    {
        return view('admin.products.category');
    }
    public function saveProduct(Request $request)
    {
        $this->authorize('add', new Product);
        $product_id = Product::create([
            "pro_name" => $request->get("name"),
            "pro_detail"=>$request->get("desc"),
            "pro_status"=>$request->get("status"),
            "pro_price"=>$request->get("price"),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
            "pro_class"=>$request->get('class_id'),
            "cat_id"=>$request->get('category')
        ]);
        $data = $request->all();
        $file = $request->file('images');
        if($file)
        {
            $i=0;
            $thumbnailPath = public_path('uploads/pro_thumbnail/');
            $destinationPath  = public_path('uploads/pro_images/');
            foreach($file as $image)
            {
                $i++;
                $image->getClientOriginalName();
                $image->getClientOriginalExtension();
                $image->getRealPath();
                $image->getSize();
                $image->getMimeType();
                //Move Uploaded File
                $imageName = time().$i.'_5starunity.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);

                $product_images = Product_images::create([
                    "pro_id" =>$product_id->id,
                    "pro_image"=>$imageName,
                    "created_at"=>Carbon::now(),
                    "updated_at"=>Carbon::now()
                ]);
            }
        }

        return redirect('admin/product/create');
    }
}
