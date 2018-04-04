<?php

use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = array('View users','Create users','Update users', 'Delete users');

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $permissions = array('View users','Create users','Update users', 'Delete users');

        foreach($permissions as $permision)
        {
            Permission::where('name',$permision)->delete();
        }   
    }
}
