<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\AllowedCountry;
use App\Models\ContactUs;
use App\Models\Subscription;
use App\Models\Admin;
use App\Models\Role;
use Auth;
use DB;
class AdminController extends Controller
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
        $allowedCountries = [];
        $country_list = Country::all();
        $allowed_countries  = AllowedCountry::all();
        foreach($allowed_countries as $country)
        {
            $allowedCountries[] = $country->country_id;
        }
        return view('admin.settings.index',compact('country_list','allowedCountries'));
    }
    public function saveSettings(Request $request)
    {
        $countries = $request->get('country_list');
        DB::table('allowed_countries')->truncate();
        foreach($countries as $i=>$country)
        {
            AllowedCountry::create([
                "country_id" => $countries[$i],
                "status"=>"0"
            ]);
        }
        return redirect('admin/settings');
    }
    public function contact_us()
    {
        $contactus_quries = ContactUs::all();
        return view('admin.contactus.index',compact('contactus_quries'));
    }
    public function subscriber()
    {
        $subscirberList = Subscription::where('status','0') ->groupBy('email')->get();
        return view('admin.users.subscriber',compact('subscirberList'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.admins.create', compact('roles'));
    }
    public function saveAdmin(Request $request)
    {
        $checkAdmin = Admin::where('email',$request->get('email'))->count();
        if($checkAdmin==0)
        {
            $password = $password= bcrypt($request->get('password'));
            Admin::create([
                "fname"=>$request->get('fname'),
                "lname"=>$request->get('lname'),
                "email"=>$request->get('email'),
                "password"=>$password,
                "role_id"=>$request->get('role'),
            ]);
            return redirect()->back()->with('success','Admin Created ');
        }
        else
        {
            return redirect()->back()->with('error','Admin Already Exists ');
        }
    }
    public function adminListing()
    {
        $admins = Admin::select('admin_roles.id as role_id','admin_roles.name as role_name','admins.*','admins.id as admin_id')->join('admin_roles','admin_roles.id','=','role_id')->get();
        return view('admin.admins.admin_listing',compact('admins'));
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();
        return view('admin.admins.edit',compact('admin','roles'));
    }
    public function update($id,Request $request)
    {
        $password = $password= bcrypt($request->get('password'));
        $admin = Admin::find($id);

        $admin->fname=$request->get('fname');
        $admin->lname=$request->get('lname');
        $admin->email = $request->get('email');
        $admin->role_id = $request->get('role');
        if($request->get('password')!="")
            $admin->password=$password;

        $admin->save();
        return redirect()->back()->with('success','Admin Created ');
    }
    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->back()->with('success','Admin Deleted');

    }
    
}
