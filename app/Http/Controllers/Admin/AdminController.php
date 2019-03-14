<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\AllowedCountry;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $country_list = Country::all();
        return view('admin.settings.index',compact('country_list'));
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
}
