<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
class LottryController extends Controller
{

    public function index()
    {
        return view('admin.lotteries.index');
    }
    public function create()
    {
        return view('admin.lotteries.create');
    }
    public function edit()
    {
        return view('admin.lotteries.documents');
    }

}
