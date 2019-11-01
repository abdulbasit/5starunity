<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $this->authorize('list', new Slider);
        $slidersData= Slider::all();
        return view('admin.sliders.index',compact('slidersData'));
    }
    public function create()
    {
        $this->authorize('add', new Slider);
        return view('admin.sliders.create');
    }
    public function saveSlider(Request $request)
    {
        $this->authorize('edit', new Slider);
        $file = $request->file('image');
        $destinationPath = public_path('uploads/slider/');
        $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $imageName);

        $slider_id = Slider::create([
            "name" => $request->get("name"),
            "link"=>$request->get("link"),
            "image"=>$imageName,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);
        return redirect('admin/sliders');
    }
    public function deleteSlider($id)
    {
        $this->authorize('delete', new Slider);
        $sliderImage = Slider::where('id',$id);
        $sliderImage->delete();
        return redirect('admin/sliders');
    }
}
