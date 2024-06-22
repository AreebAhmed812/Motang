<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            
            [
                'name' => 'Super Admin',
                'status' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Asst Admin',
                'status' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Seller',
                'status' => 1,
                'user_id' => 1,
            ],

        ];

        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
