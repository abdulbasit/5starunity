<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;
use Auth;
use Session;
class CompanyController extends Controller
{

    public function index()
    {
        $company = Company::all();
        return view('promotions.index',compact('company'));
    }
}