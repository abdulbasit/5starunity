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
        $this->authorize('list', new Page);
        $page = Page::all();
        return view('admin.pages.index',compact('page'));
    }
    public function create()
    {
        $this->authorize('add', new Page);
        return view('admin.pages.create');
    }
    public function save(Request $request)
    {
        $this->authorize('add', new Page);
        $lottery_id = Page::create([
            "page_name" => $request->get("name"),
            "page_slug" => $this->cleanString($request->get("name")),
            "page_title"=>$request->get("title"),
            "page_content"=>$request->get("content")
        ]);

        return redirect('admin/pages');
    }
    public function edit($id)
    {
        $this->authorize('edit', new Page);
        $page = Page::find($id);
        return view('admin.pages.edit',compact('page'));
    }
    public function update(Request $request)
    {
        $this->authorize('edit', new Page);
        $id = $request->get("page_id");
        $page = Page::find($id);
        $page->page_name=$request->get("name");
        $page->page_slug=$request->get("slug");
        $page->page_title = $request->get("title");
        $page->page_content=$request->get("content");
        $page->save();
        return redirect('admin/pages');
    }
    public function delete($id)
    {
        $this->authorize('delete', new Page);
        $page = Page::where('id',$id);
        $page->delete();
        return redirect('admin/pages');
        
    }
    function cleanString($string)
    {
        // allow only letters
        $res = preg_replace("/[^a-zA-Z]/", "_", $string);

        // trim what's left to 8 chars
        // $res = substr($res, 0, 8);

        // make lowercase
        $res = strtolower($res);

        // return
        return $res;
    }

}