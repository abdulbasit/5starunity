<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\AllowedCountry;
use App\Models\ContactUs;
use App\Models\Subscription;
use App\Models\Admin;
use App\Models\Badge;
use App\Models\Role;
use Auth;
use DB;
class BadgeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $badge = Badge::all();
        return view('admin.badges.index',compact('badge'));
    }
    public function create()
    {
        return view('admin.badges.create',compact('badge'));
    }
    public function save(Request $request)
    {
        
        Badge::create([
            'name'=>$request->get('name'),
            'badge_type'=>$request->get('type')
        ]);
        
        return redirect()->back()->with('success','Badge Created Successfully ');
    }
    public function edit($id)
    {
        $badge = Badge::find($id);
        return view('admin.badges.edit',compact('badge'));
    }
    public function update($id,Request $request)
    {
        $badge = Badge::find($id);
        $badge->name =  $request->get('name');
        $badge->badge_type =  $request->get('type');
        $badge->save();
        return redirect()->back()->with('success','Badge Update Successfully ');
    }
    public function delete()
    {

    }
}
