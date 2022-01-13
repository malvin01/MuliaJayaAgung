<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'email' => 'admin@role.test',
            'name' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password12'),
        ]);

        $admin->assignRole('admin');
    }
}
