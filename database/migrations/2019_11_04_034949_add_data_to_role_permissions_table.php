<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;
class AddDataToRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $promotionPartners = DB::table('permissions')->insert(
            array(
                'id'=>15,
                'name' => 'Promotion Partners',
                'class'=> "PromotinoPartner",
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
                        'permission_id' => 15,
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            //
        });
    }
}
