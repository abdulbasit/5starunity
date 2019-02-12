<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index');
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function documents()
    {
        return view('admin.products.documents');
    }
    public function createCategories()
    {
        return view('admin.products.create_category');
    }
    public function categories()
    {
        return view('admin.products.category');
    }
}
