<?php

namespace App\Http\Controllers;
use App\Models\CompanyView;
use Illuminate\Http\Request;
use App\Models\BonusTaler;
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
                            ->select('companies.*','company_views.*','companies.id as company_id')
                            ->selectRaw('COUNT(company_views.company_id) as totalViews')
                            ->leftjoin('company_views','companies.id','company_id')
                            ->groupBy('companies.id','company_views.company_id')
                            ->orderBy('companies.id','desc')
                            ->paginate(18);
        // dd($company);
        // dd(DB::getQueryLog());
        return view('promotions.index',compact('company','user_id'));
    }
    public function detail($id)
    {
        $company_detail = Company::where('id',$id)->first();
        return view('promotions.detail',compact('company_detail'));
    }
    public function bonusTalerAdd($id)
    {
        $company_detail = Company::where('id',$id)->first();
        $user_id = Auth::guard('client')->user()->id;
        $amount = $company_detail->user_amount;
        $checkTotalCredit = BonusTaler::where('user_id',$user_id)->orderBy('id','desc')->first();
            if( BonusTaler::where('user_id',$user_id)->count()==0)
            {
                $remainingTotalBalance = $amount;
                $balance = $amount;
                $previousBalance = "";
            }
            else
            {
                $remainingTotalBalance = $checkTotalCredit->total_available_balance+$amount;
                $balance = $amount;
                $previousBalance = $checkTotalCredit->total_available_balance;
            }
           
            $vallet_id = BonusTaler::create([
                "user_id" => $user_id,
                "credit"=>'0.00',
                "balance"=>$balance.".00",
                "pre_balance"=> $previousBalance,
                "total_available_balance"=>$remainingTotalBalance,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
            ]);
            CompanyView::create([
                "user_id" => $user_id,
                "company_id" => $id,

            ]);
            return redirect('/promotions')->with('success',"Company Added Successfully ");
    }
}