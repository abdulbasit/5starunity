<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Carbon\Carbon;
use Auth;
use DB;
class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.role');
    }
    public function createRole()
    {
        return view('admin.permissions.create_role');
    }
    public function saveRole(Request $request)
    {
        Role::create([
            "name" => $request->get("name"),
            "slug" => $request->get("slug")
        ]);

        return redirect()->back()->with('success','Role Created');
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
        $page->page_slug=$request->get("slug");
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