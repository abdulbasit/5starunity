<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Company;
use App\Models\Category;
use App\Models\ProClassification;
use App\Models\Product_images;
use DB;
use Storage;

class CompaniesController extends Controller
{
    public function index()
    {
        $this->authorize('list', new Company);
        $companies = Company::all();
        return view('admin.companies.index',compact('companies','category'));
    }
    public function creatCategory()
    {
        return view('admin.companies.category_create');
    }
    public function create()
    {
        $this->authorize('add', new Company);
        $category = Category::where('category_for','company')->get();
        return view('admin.companies.create',compact('category'));
    }
    public function save(Request $request)
    {
        $this->authorize('add', new Company);
        if($request->file('image')!="")
        {
            $file = $request->file('image');
            $thumbnailPath = public_path('uploads/copmany_images/');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
            $file->move($thumbnailPath, $imageName);
        }
        else
        {
            $imageName="";
        }
        $company = Company::create([
            "category_id"=>$request->get('category'),
            "company_name"=>$request->get('company'),
            "company_views"=>$request->get('views'),
            "company_views_attempt"=>$request->get('views_allowed'),
            "duration"=>$request->get('duration'),
            "vidoe"=>$request->get('youtube_video'),
            "image"=>$imageName,
            "view_counter"=>$request->get('views'),
            "views_amount"=>$request->get('amount'),
            "user_amount"=>$request->get('per_view_amount')
        ]);
        return redirect('admin/company')->with('success',"Company Added Successfully ");
    }
    public function edit($id)
    {
        $this->authorize('edit', new Company);
        $category = Category::where('category_for','company')->get();
        $company = Company::find($id);
        return view('admin.companies.edit',compact('company','category'));
    }
    public function saveEdits(Request $request)
    {
        $this->authorize('edit', new Company);
        $company_id = $request->get('company_id');
        $companyUpdate = Company::find($company_id);

        $companyUpdate->company_name = $request->get('company');
        $companyUpdate->category_id = $request->get('category');
        $companyUpdate->company_views = $request->get('views');
        $companyUpdate->company_views_attempt = $request->get('views_allowed');
        $companyUpdate->duration=$request->get('duration');
        $companyUpdate->vidoe = $request->get('youtube_video');
        if($request->file('image')!="")
        {
            $file = $request->file('image');
            $thumbnailPath = public_path('uploads/copmany_images/');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
            $file->move($thumbnailPath, $imageName);
            $companyUpdate->image=$imageName;
        }
        $companyUpdate->view_counter = $request->get('views');
        $companyUpdate->views_amount = $request->get('amount');
        $companyUpdate->user_amount = $request->get('per_view_amount');
        $companyUpdate->save();
        return redirect('admin/company')->with('success',"Company Updated Successfully ");   
    }
    public function delete($id)
    {
        $this->authorize('delete', new Company);
        $company = Company::find($id);
        $company->delete();
        return redirect('admin/company')->with('success',"Company Deleted Successfully ");   
    }
    // function getYouTubeVideoId(Request $request) 
    // {
    //    $vidID = $request->videoId;
    //    $xml = simplexml_load_file('http://gdata.youtube.com/feeds/api/videos/'.$vidID);
    //    echo  strval($xml->xpath('//yt:duration[@seconds]')[0]->attributes()->seconds);
    // }
}
