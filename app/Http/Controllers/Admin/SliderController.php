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

    public function index()
    {
        $slidersData= Slider::all();
        return view('admin.sliders.index',compact('slidersData'));
    }
    public function create()
    {
        return view('admin.sliders.create');
    }
    public function saveSlider(Request $request)
    {

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
    }
}
