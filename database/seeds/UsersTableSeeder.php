<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['name'=>'user1','email'=>'admin@gmail.com', 'password'=>bcrypt('123456')],
            ['name'=>'user2','email'=>'escritor@gmail.com', 'password'=>bcrypt('123456')]
        );

        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
