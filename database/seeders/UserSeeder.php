<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Boniface murage',
            'username' => 'Rubon_tech',
            'role' => 'employee',
            'email' => 'murageboniface@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@murage2025'),
            'remember_token'=> Str()->random(10),
            'created_at'=> now(),
            'updated_at' => now(),
        ]);
    }
}
