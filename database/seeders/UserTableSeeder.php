<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        $users = [
            [
                'name' => 'Admin',
                'email' =>  'admin@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'user',
                'email' =>  'user@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $key => $user){
            if ($key == 0){
                $admin = User::create($user);
                $admin->assignRole('admin');
            }
            else{
                 $u = User::create($user);
                 $u->assignRole('user');
            }
        }
    }
}
