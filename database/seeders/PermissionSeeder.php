<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            [
            'name' => 'read-user',
            'display_name' => 'Read User',
            'group' => 'User Management'
            ],
            [
            'name' => 'create-user',
            'display_name' => 'Create User',
            'group' => 'User Management'
            ],
            [
            'name' => 'update-user',
            'display_name' => 'Update User',
            'group' => 'User Management'
            ],
             [
            'name' => 'read-role',
            'display_name' => 'Read Role',
            'group' => 'Role Management'
            ],
            [
            'name' => 'create-role',
            'display_name' => 'Create Role',
            'group' => 'Role Management'
            ],
            [
            'name' => 'update-role',
            'display_name' => 'Update Role',
            'group' => 'Role Management'
            ],
            ];
            foreach($permissions as $permission) {
                Permission::create($permission);
            }
    }
}
