<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use Auth;
class LottryController extends Controller
{

    public function index()
    {
        return view('admin.lotteries.index');
    }
    public function create()
    {
        $products = Product::all();
        return view('admin.lotteries.create',compact('products'));
    }
    public function edit()
    {
        return view('admin.lotteries.documents');
    }

}
