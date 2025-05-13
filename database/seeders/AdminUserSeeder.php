<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
        ]);

        Profile::create([
            'user_id' => $admin->id,
            'username' => 'admin',
            'bio' => 'Manchester United website admin.',
            'birthday' => '1990-01-01',
            'profile_picture' => null,
        ]);
    }
}