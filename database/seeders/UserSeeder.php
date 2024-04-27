<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $supervisorRole = Role::firstOrCreate(['name' => 'supervisor']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $company1 = Company::firstOrCreate(['name' => 'PT XYZ']);
        $company2 = Company::firstOrCreate(['name' => 'PT XYZ-1']);
        $company3 = Company::firstOrCreate(['name' => 'PT XYZ-2']);

        $company1->users()->create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
        ])->roles()->attach($adminRole->id);

        $company1->users()->create([
            'name' => 'Manager User',
            'email' => 'manager@mail.com',
            'password' => bcrypt('password'),
        ])->roles()->attach($managerRole->id);

        $company2->users()->create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@mail.com',
            'password' => bcrypt('password'),
        ])->roles()->attach($supervisorRole->id);

        for ($i = 1; $i <= 5; $i++) {
            $company1->users()->create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@ptxyz.com',
                'password' => bcrypt('password'),
            ])->roles()->attach($userRole->id);

            $company2->users()->create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@ptxyz1.com',
                'password' => bcrypt('password'),
            ])->roles()->attach($userRole->id);

            $company3->users()->create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@ptxyz2.com',
                'password' => bcrypt('password'),
            ])->roles()->attach($userRole->id);
        }
    }
}
