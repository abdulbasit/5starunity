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
        DB::enableQueryLog();
        $company = Company::
                            with(['company_views'])
                            ->select('companies.*','company_views.*')
                            ->selectRaw('COUNT(company_views.company_id) as totalViews')
                            ->leftjoin('company_views','companies.id','company_id')
                            ->groupBy('companies.id','company_views.company_id')
                            ->orderBy('companies.id','desc')
                            ->paginate(18);

        // dd(DB::getQueryLog());
        return view('promotions.index',compact('company','user_id'));
    }
    public function detail($id)
    {
        $company_detail = Company::where('id',$id)->first();
        return view('promotions.detail',compact('company_detail'));
    }
}