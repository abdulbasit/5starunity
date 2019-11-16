<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Badge;
use App\Models\PromotionPartner;
use App\Models\PromotionImage;
use DB;
class PromotionsPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        // $this->authorize('list', new Product);
        $promotions = PromotionPartner::select('categories.id as cat_id','categories.name',
                                        'promotion_partners.id as promotion_id',
                                        'promotion_partners.price as p_price',
                                        'promotion_partners.discount_amount as d_amount',
                                        'promotion_partners.start_date as p_start',
                                        'promotion_partners.end_date','promotion_partners.reference_website',
                                        'promotion_partners.name as promo_name','badges.*',
                                        'badges.name as badge_name','badges.id as badge_id')
                                        ->join('categories','category_id','categories.id')
                                        ->leftjoin('badges','badges.id','promotion_partners.type')
                                        ->get();
        return view('admin.promotion_partner.index',compact('promotions'));
    }
    public function create()
    {
        // $this->authorize('add', new Product);
        $category = Category::where("category_for",'promo_partners')->get();
        $badges= Badge::all();
        return view('admin.promotion_partner.create',compact('category','badges'));
    }
    public function save(Request $request)
    {
        // $this->authorize('add', new Product);
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));

        $promo_id = PromotionPartner::create([
            "name" => $request->get("name"),
            "type"=>$request->get("type"),
            "price"=>$request->get("amount"),
            "start_date"=>$start_date,
            "end_date"=>$end_date,
            "reference_website"=>$request->get("siteurl"),
            "short_description"=>$request->get('desc'),
            'category_id'=>$request->get('category'),
            'discount_amount'=>$request->get('dis_amount')
        ]);
        
        $file = $request->file('images');
        if($file)
        {
            $i=0;
            $destinationPath  = public_path('uploads/promo_images/');
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

                PromotionImage::create([
                    "promotinos_id" =>$promo_id->id,
                    "image"=>$imageName,
                    "created_at"=>Carbon::now(),
                    "updated_at"=>Carbon::now()
                ]);
            }
        }
        return redirect('admin/promotions')->with('success','Promotions added successfully !');
    }
    public function edit($id)
    {
        // $this->authorize('edit', new Product);
        $category = Category::where("category_for",'promo_partners')->get();
        $promoInfo = PromotionPartner::where("id",$id)->first();
        $promoImgs = PromotionImage::where('promotinos_id',$id)->get();
        $badges= Badge::all();
        return view('admin.promotion_partner.edit',compact('promoInfo','promoImgs','category','badges'));
    }
    public function deletePhoto(Request $request)
    {
        // $this->authorize('delete', new Product);
        $productImage = PromotionImage::where('id',$request->get('id'));
        $productImage->delete();
    }
    public function delete($id)
    {
        // $this->authorize('delete', new Product);
        $PromotionPartner = PromotionPartner::where('id',$id);
        $PromotionPartner->delete();
        return redirect('admin/promotions');
    }
    public function update($id,Request $request)
    {
        // $this->authorize('edit', new Product);
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));
        $promo = PromotionPartner::find($id);
        $promo->name= $request->get("name");
        $promo->type=$request->get("type");
        $promo->price=$request->get("amount");
        $promo->start_date=$start_date;
        $promo->end_date=$end_date;
        $promo->reference_website=$request->get("siteurl");
        $promo->short_description=$request->get('desc');
        $promo->category_id=$request->get('category');
        $promo->discount_amount=$request->get('dis_amount');
        $promo->save();

        $file = $request->file('images');
        if($file)
        {
            $i=0;
            $destinationPath  = public_path('uploads/promo_images/');
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

                PromotionImage::create([
                    "promotinos_id" =>$id,
                    "image"=>$imageName,
                    "created_at"=>Carbon::now(),
                    "updated_at"=>Carbon::now()
                ]);
            }
        }
        return redirect()->back()->with('success','Promotion updated successfully ');
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
   
}
