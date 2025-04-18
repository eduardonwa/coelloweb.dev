<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'coelloweb@aol.com')->exists()) {
            $user = User::create([
                'name' => 'Eduardo Coello',
                'email' => 'coelloweb@aol.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ]);
            
            $user->assignRole('admin');
        }
    }
}
