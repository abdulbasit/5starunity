<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use Auth;
use DB;
class PageController extends Controller
{
    public function index()
    {
        $page = Page::all();
        return view('admin.pages.index',compact('page'));
    }
    public function create()
    {
        return view('admin.pages.create');
    }
    public function save(Request $request)
    {
        $lottery_id = Page::create([
            "page_name" => $request->get("name"),
            "page_title"=>$request->get("title"),
            "page_content"=>$request->get("content")
        ]);

        return redirect('admin/pages');
    }
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit',compact('page'));
    }
    public function update(Request $request)
    {
        $id = $request->get("page_id");
        $page = Page::find($id);
        $page->page_name=$request->get("name");
        $page->page_title = $request->get("title");
        $page->page_content=$request->get("content");
        $page->save();
        return redirect('admin/pages');
    }
    public function delete($id)
    {
        $page = Page::where('id',$id);
        $page->delete();
        return redirect('admin/pages');
        
    }
}