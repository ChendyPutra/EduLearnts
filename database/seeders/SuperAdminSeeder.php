<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'superadmin@edulearnt.test'], // supaya tidak dobel
            [
                'name' => 'Super Admin',
                'password' => Hash::make('supersecure123'),
                'role' => 'superadmin'
            ]
        );
    }
}
