<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => 'test' . $i,
                'email' => 'test' . $i . '@example.com',
                'password' => Hash::make('123456'),
                'first_name' => 'Test ' . $i,
                'last_name' => 'Testowy ' . $i
            ]);
        }
    }
}
