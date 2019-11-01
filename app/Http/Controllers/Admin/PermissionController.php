<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Carbon\Carbon;
use Auth;
use DB;
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
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
        $role=Role::create([
            "name" => $request->get("name"),
            "slug" => $request->get("slug")
        ]);
        //copy permissions while creating a role 
        Permission::copyPermissions($role->id);
        return redirect('/admin/permissions/'.$role->id);
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
    public function roles()
    {
        // $this->authorize('list', new Role);
        $role = Role::all();
        return view('admin.permissions.role',compact('role'));

    }
    public function editRole($id)
    {
        $this->authorize('edit', new Role);
        $role = Role::find($id);
        return view('admin.permissions.edit',compact('role'));
    }
    public function updateRole(Request $request)
    {
        $id = $request->get('id');
        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->slug = $request->get('slug');
        $role->save();
        return redirect()->back()->with('success',"Role Updated");
    }
    public function deleteRole($id)
    {
        $this->authorize('delete', new Role);
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('error',"Role Deleted ");
    }
    public function permissions($role_id)
    {
        DB::enableQueryLog();
        $permissions = RolePermission::select('permissions.id as permissions_id','permissions.name','permissions.class',
                                            'role_permissions.*','role_permissions.id as rol_permission_id')
                                        ->join('permissions','permissions.id','=','permission_id')
                                        ->where('role_id',$role_id)->get();
        // dd(DB::getQueryLog());
        
        return view('admin.permissions.permission_index',compact('permissions','role_id'));
    }
    public function saveRolePermission(Request $request)
    {
        $role_id = $request->get('role_id');
        $permissions = RolePermission::where('role_id',$role_id)->get();
        
        foreach($permissions as $permissionData)
        {
            $permissionData->add =  $request->get('add_'.$permissionData->id);
            $permissionData->edit =  $request->get('edit_'.$permissionData->id);
            $permissionData->delete =  $request->get('delete_'.$permissionData->id);
            $permissionData->view =  $request->get('view_'.$permissionData->id);
            $permissionData->list =  $request->get('list_'.$permissionData->id);
            $permissionData->save();
        }
        return redirect()->back()->with('success','Permissions assigned');
    }
}