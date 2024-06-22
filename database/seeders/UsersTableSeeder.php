<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@motong.com',
                'password' => bcrypt('Admin@123'),
                'username' => 'Super-Admin',
                'user_type' => 0,
                'status'=>'Active',
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
