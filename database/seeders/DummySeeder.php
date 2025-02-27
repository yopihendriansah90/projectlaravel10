<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 13542; $i < 19541; $i++) {
            # code...

            User::create([
                'name' => 'User ke ' . $i,
                'email' => 'user' . $i . '@mail.com',
                'password' => Hash::make('password'),

            ]);
        }
    }
}
