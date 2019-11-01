<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Carbon\Carbon;
use App\Models\DiscountCuppon;
use DB;
use Storage;

class CupponController extends Controller
{
    public function index()
    {
        $this->authorize('list', new DiscountCuppon);
        $allCuppons = DiscountCuppon::all();
        
        return view('admin.cuppons.index',compact('allCuppons'));
    }
    public function create()
    {
        $this->authorize('add', new DiscountCuppon);
        return view('admin.cuppons.create');
    }
    public function save(Request $request)
    {
        $this->authorize('add', new DiscountCuppon); 
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));
        DiscountCuppon::create([
            "name"=>$request->get('name'),
            "description"=>$request->get('desc'),
            "type"=>$request->get('type'),
            "price"=>$request->get('amount'),
            "start_date"=>$start_date,
            "end_date"=>$end_date,
            "reference_website"=>$request->get('siteurl'),
            "usage"=>$request->get('limit'),
            'category'=>$request->get('category'),
            'cuppon_code'=>$request->get('code')
        ]);
        return redirect('admin/cuppons');
    }
    public function edit($id)
    { 
        $this->authorize('edit', new DiscountCuppon);
        $cupponDetial = DiscountCuppon::where('id',$id)->first();
        return view('admin.cuppons.edit',compact('cupponDetial'));
    }
    public function update(Request $request)
    {
        $this->authorize('edit', new DiscountCuppon);
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));
        $id = $request->get('id');
        $cupponDetial = DiscountCuppon::where('id',$id)->first();
        $cupponDetial->name= $request->get('name');
        $cupponDetial->description= $request->get('desc');
        $cupponDetial->type= $request->get('type');
        $cupponDetial->price= $request->get('amount');
        $cupponDetial->start_date= $start_date;
        $cupponDetial->end_date= $end_date;
        $cupponDetial->reference_website= $request->get('siteurl');
        $cupponDetial->category= $request->get('category');
        $cupponDetial->usage= $request->get('limit');
        // $cupponDetial->cuppon_code=$request->get('code');
        $cupponDetial->save();
        return redirect('admin/cuppons');
    }
    public function delete($id)
    {
        $this->authorize('delete', new DiscountCuppon);
        $cuppon = DiscountCuppon::find($id);
        $cuppon->delete();
        return redirect()->back()->with('success',"Cuppon Deleted Successfully!");
    }
}