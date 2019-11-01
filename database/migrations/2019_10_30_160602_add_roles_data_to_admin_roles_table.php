<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;
class AddRolesDataToAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('admin_roles')->insert(
            array(
                'id'=>1,
                'name' => 'Super Admin',
                'slug'=>"super-admin",
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('admin_roles')->insert(
            array(
                'id'=>2,
                'name' => 'Admin',
                'slug'=>"aministrator",
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>1,
                'name' => 'Blog',
                'class'=>"Blog",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>2,
                'name' => 'Companies',
                'class'=>"Company",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>3,
                'name' => 'Contact Us Queries',
                'class'=>"ContactUs",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>4,
                'name' => 'Discount Cuppons',
                'class'=>"DiscountCuppon",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>5,
                'name' => 'Testimonials/Donors',
                'class'=>"Testimonial",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>6,
                'name' => 'Fronted Pages ',
                'class'=>"Page",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>7,
                'name' => 'Lotteries',
                'class'=>"Lottery",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>8,
                'name' => 'Products',
                'class'=>"Product",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>9,
                'name' => 'Web Sliders',
                'class'=>"Slider",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        
        DB::table('permissions')->insert(
            array(
                'id'=>10,
                'name' => 'Website Users',
                'class'=>"User",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>11,
                'name' => 'Categories /Blog/Product/Lotteries',
                'class'=>"Category",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>12,
                'name' => 'Admin Roles',
                'class'=>"Role",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>13,
                'name' => 'Permissions for admin',
                'class'=>"Permission",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        DB::table('permissions')->insert(
            array(
                'id'=>14,
                'name' => 'Role Permissions',
                'class'=> "RolePermission",
                'add'=>0,
                'edit'=>0,
                'delete'=>0,
                'view'=>0,
                'list'=>0,
                'all'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            )
        );
        $roles = Role::all();
        foreach($roles as $role)
        {
            $permissionsResult = Permission::all();
            foreach($permissionsResult as $role_permission)
            {
                DB::table('role_permissions')->insert(
                    array(
                        'permission_id' => $role_permission->id,
                        'role_id'=> $role->id,
                        'add'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'view'=>1,
                        'list'=>1,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now(),
                    )
                );
            }
        }
        $admins = Admin::where('id','1')->first();
        $admins->role_id=1;
        $admins->save();
    }
    public function down()
    {
        Schema::table('admin_roles', function (Blueprint $table) {
            //
        });
    }
}
