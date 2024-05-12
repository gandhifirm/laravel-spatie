<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $masterAdmin  = User::create(
            [
                "name"      => "Master Admin",
                "email"     => "master.admin@gmail.com",
                "password"  => bcrypt("12345Admin"),
            ]
        );
        $masterAdmin->assignRole("Master Admin");

        $admin  = User::create(
            [
                "name"      => "Admin",
                "email"     => "admin@gmail.com",
                "password"  => bcrypt("12345Admin"),
            ]
        );
        $admin->assignRole("Admin");
    }
}