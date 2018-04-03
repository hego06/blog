<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleWriter = Role::create(['name' => 'Writer']);

        $admin = User::find(1);
        $admin->assignRole($roleAdmin);

        $writer = User::find(2);
        $admin->assignRole($roleWriter);
    }
}
