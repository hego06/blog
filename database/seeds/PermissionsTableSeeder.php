<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=array(
            'View posts', 'Create posts', 'Update posts', 'Delete posts'
        );

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }  
    }
}
