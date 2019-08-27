<?php

namespace App\Http\Controllers;
use App\Models\CompanyView;
use Illuminate\Http\Request;
use App\Models\BonusTaler;
use App\Models\Company;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserDocument;
use App\Models\Category;
use App\Models\TransLog;
use App\Models\Vallet;
use Carbon\Carbon;

use Auth;
use DB;
use Session;
class CompanyController extends Controller
{

    public function index()
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='promotions';
        $user_id = Auth::guard('client')->user()->id;
        $category = Category::where('category_for','company')->get();
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
        return view('promotions.index',compact('company','user_id','userInfo','route','category'));
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
        $checkTotalCredit = Vallet::where('user_id',$user_id)->where('type','bonus')->orderBy('id','desc')->first();
            if( Vallet::where('user_id',$user_id)->where('type','bonus')->count()==0)
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
           
            $vallet_id = Vallet::create([
                "user_id" => $user_id,
                "credit"=>'0.00',
                "balance"=>$balance.".00",
                "pre_balance"=> $previousBalance,
                "total_available_balance"=>$remainingTotalBalance,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
                'type'=>'bonus',
                'status'=>'approved'
            ]);
            $trans_log = TransLog::create([
                "type" => 'bonus',
                "payment_method"=>'Promotion Talers',
                "amount"=>$amount,
                "trans_id"=>strtoupper(uniqid($vallet_id->id)),
                "state"=>'completed',
                "invoice_number"=>uniqid($vallet_id->id),
                "vallet_id"=>$vallet_id->id,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            CompanyView::create([
                "user_id" => $user_id,
                "company_id" => $id,

            ]);
            return redirect('/promotions')->with('success',"Company Added Successfully ");
    }
}