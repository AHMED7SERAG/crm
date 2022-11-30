<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Super Admin' ,'label' => "Super Admin"]);
        $user = User::create([
            'name' => "Super Admin",
            'email' => "super_admin@admin.com",
            'password' => Hash::make("123456"),
        ]);
        $user->assignRole(['Super Admin']);

    }
}
