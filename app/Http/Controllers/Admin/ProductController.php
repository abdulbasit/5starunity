<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProClassification;
use App\Models\Product_images;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        $products= Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function edit($id)
    {
        $productInfo = Product::find($id);
        $productImgs = Product_images::where('pro_id',$id)->get();
        return view('admin.products.edit',compact('productInfo','productImgs'));
    }
    public function deletePhoto(Request $request)
    {
        $productImage = Product_images::where('id',$request->get('id'));
        $productImage->delete();
    }
    public function delete($id)
    {
        $productImage = Product::where('id',$id);
        $productImage->delete();
        return redirect('admin/products');
    }
    public function update($id,Request $request)
    {
        $product = Product::find($id);
        $product->pro_name=$request->get("name");
        $product->pro_detail=$request->get("desc");
        $product->pro_status=$request->get("status");
        $product->pro_price=$request->get("price");
        $product->updated_at=Carbon::now();
        $product->pro_class=$request->get('class_id');
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
        $product_id = Product::create([
            "pro_name" => $request->get("name"),
            "pro_detail"=>$request->get("desc"),
            "pro_status"=>$request->get("status"),
            "pro_price"=>$request->get("price"),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
            "pro_class"=>$request->get('class_id')
        ]);
        $data = $request->all();
        $file = $request->file('images');
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
        return redirect('admin/product/create');
    }
}
