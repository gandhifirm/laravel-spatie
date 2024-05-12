<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name"=> "Add User"]);
        Permission::create(["name"=> "Edit User"]);
        Permission::create(["name"=> "Delete User"]);
        Permission::create(["name"=> "Show User"]);

        Permission::create(["name"=> "Add Content"]);
        Permission::create(["name"=> "Edit Content"]);
        Permission::create(["name"=> "Delete Content"]);
        Permission::create(["name"=> "Show Content"]);

        Role::create(["name"=> "Master Admin"]);
        Role::create(["name"=> "Admin"]);

        $roleMasterAdmin  = Role::findByName("Master Admin");
        $roleMasterAdmin->givePermissionTo("Add User");
        $roleMasterAdmin->givePermissionTo("Edit User");
        $roleMasterAdmin->givePermissionTo("Delete User");
        $roleMasterAdmin->givePermissionTo("Show User");

        $roleAdmin  = Role::findByName("Admin");
        $roleAdmin->givePermissionTo("Add Content");
        $roleAdmin->givePermissionTo("Edit Content");
        $roleAdmin->givePermissionTo("Delete Content");
        $roleAdmin->givePermissionTo("Show Content");
    }
}