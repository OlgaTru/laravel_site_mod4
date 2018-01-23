<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        for($index = 1; $index <= 10; $index++) {
            $user = new User();
            $user->name = "Visitor$index";
            $user->email = "visitor$index@123.com";
            $user->password = bcrypt('visitor');
            $user->save();
            $user->roles()->attach($role_user);
        }

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@123.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
