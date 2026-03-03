<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
    
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      \App\Models\User::create([
    'name' => 'ahmed',
    'email' => 'admin@admin.com',
    'password' => Hash::make('admin'), // كلمة المرور
    'role' => 'admin',
]);
    }
}
