<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Product_images;
class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
    public function create()
    {
        return view('admin.products.create');
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
        ]);
        echo $product_id->id;
        $data = $request->all();
        $file = $request->file('images');
        $i=0;
        foreach($file as $image )
        {
            $i++;
            $image->getClientOriginalName();
            $image->getClientOriginalExtension();
            $image->getRealPath();
            $image->getSize();
            $image->getMimeType();
            //Move Uploaded File
            $destinationPath  = public_path('uploads/pro_images/');
            $imageName = time().$i.$product_id->id.'_5starunity.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            $product_id = Product_images::create([
                "pro_id" =>$product_id->id,
                "pro_image"=>$imageName,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
        }
        return redirect('admin/product/create');
    }

}
