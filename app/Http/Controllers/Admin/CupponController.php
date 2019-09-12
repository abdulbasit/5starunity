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
        $allCuppons = DiscountCuppon::all();
        
        return view('admin.cuppons.index',compact('allCuppons'));
    }
    public function create()
    {
        return view('admin.cuppons.create');
    }
    public function save(Request $request)
    {
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
            'cuppon_code'=>$request->get('code')
        ]);
        return redirect('admin/cuppons');
    }
    public function edit($id)
    { 
        $cupponDetial = DiscountCuppon::where('id',$id)->first();
        return view('admin.cuppons.edit',compact('cupponDetial'));
    }
    public function update(Request $request)
    {
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
        $cupponDetial->usage= $request->get('limit');
        // $cupponDetial->cuppon_code=$request->get('code');
        $cupponDetial->save();
        return redirect('admin/cuppons');
    }
}