<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\AllowedCountry;
use App\Models\ContactUs;
use App\Models\Subscription;
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
        // $this->middleware('guest:admin');
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
}
