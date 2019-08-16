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
        $companies = Company::all();
        return view('admin.companies.index',compact('companies'));
        // $video_id= 'vKYwGoCF5eY';
        // $thumbnail="http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
    }
    public function create()
    {
        return view('admin.companies.create');
    }
    public function save(Request $request)
    {
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
            "company_name"=>$request->get('company'),
            "company_views"=>$request->get('views'),
            "company_views_attempt"=>$request->get('duration'),
            "duration"=>$request->get('duration'),
            "vidoe"=>$request->get('youtube_video'),
            "image"=>$imageName,
            "view_counter"=>$request->get('views'),
            "views_amount"=>$request->get('amount'),
            "user_amount"=>$request->get('per_view_amount')
        ]);
        return redirect('admin/company')->with('success',"Company Added Successfully ");
    }
    function getYouTubeVideoId(Request $request) 
    {
        //  $video_id = $request->videoId;
        // $video_id= 'vKYwGoCF5eY';

        // $thumbnail="http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
        
        // $info = pathinfo($thumbnail);
        // $contents = file_get_contents($thumbnail);
        // $file = '/tmp/' . $info['basename'];
        // file_put_contents($file, $contents);
        // $uploaded_file = new UploadedFile($file, $info['basename']);
    }
}
