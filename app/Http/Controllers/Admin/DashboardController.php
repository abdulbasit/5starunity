<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
class DashboardController extends Controller
{

    public function index()
    {
        // dd(Auth::guard('admin')->user()->fname);
        return view('admin.dashboard');
    }
}
