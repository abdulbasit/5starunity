<?php

namespace App\Http\Controllers;
use App\Models\CompanyView;
use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;
use Auth;
use DB;
use Session;
class CompanyController extends Controller
{

    public function index()
    {
        $user_id = Auth::guard('client')->user()->id;
        
        $company = Company::with(['company_views'])
                            ->select('company_views.*','companies.*')
                            ->selectRaw('COUNT(company_views.company_id) as totalViews')
                            ->leftjoin('company_views','companies.id','company_id')
                            ->get();
        return view('promotions.index',compact('company','user_id'));
    }
}