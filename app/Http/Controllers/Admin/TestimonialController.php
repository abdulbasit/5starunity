<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Product_images;
class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $this->authorize('list', new Testimonial);
        $testimonialData= Testimonial::all();
        return view('admin.testimonials.index',compact('testimonialData'));
    }
    public function create()
    {
        $this->authorize('add', new Testimonial);
        return view('admin.testimonials.create');
    }
    public function edit($id)
    {
        $this->authorize('edit', new Testimonial);
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.edit',compact('testimonial'));
    }
    public function delete($id)
    {
        $this->authorize('delete', new Testimonial);
        $testimonial = Testimonial::where('id',$id);
        $testimonial->delete();
        return redirect('admin/testimonials');
    }
    public function save(Request $request)
    {
        $this->authorize('add', new Testimonial);
        if($request->file('image')!="")
        {
            $file = $request->file('image');
            $thumbnailPath = public_path('uploads/testimonials/');
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

        $testimonial = Testimonial::create([
            "name" =>$request->get("name"),
            "image"=>$imageName,
            "detail"=>$request->get("desc"),
            "title"=>$request->get("title"),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/admin/testimonials');
    }
    public function update($id,Request $request)
    {
        $this->authorize('edit', new Testimonial);
        $testimonial = Testimonial::find($id);
        if($request->file('image')!="")
        {
            $file = $request->file('image');
            $thumbnailPath = public_path('uploads/testimonials/');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
            $file->move($thumbnailPath, $imageName);
            $testimonial->image=$imageName;
        }
        else

        $testimonial->name=$request->get("name");
        $testimonial->detail=$request->get("desc");
        $testimonial->title=$request->get("title");
        $testimonial->updated_at=Carbon::now();
        $testimonial->save();
        return redirect('/admin/testimonials');
    }
}
