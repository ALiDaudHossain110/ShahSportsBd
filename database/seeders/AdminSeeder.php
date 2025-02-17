<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=User::create([
            'name' =>'admin',
            'email' =>'admin@shahsports.com' ,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
 
        ]);
        $user->assignRole('admin');

    } 
}
