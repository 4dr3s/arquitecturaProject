<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'usuario1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => now(),
            'profileImage' => 'user2.jpg',
            'isAdmin' => 0,
            'password' => '$2y$10$Kbr1x7y0q.x53yno3NR2XupWTWIEBeGcD.EgjOdJCINiZJ.adG8Vy', // 1234567890
            'estado' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'usuario2',
            'email' => 'user2@gmail.com',
            'email_verified_at' => now(),
            'profileImage' => 'user3.jpg',
            'isAdmin' => 0,
            'password' => '$2y$10$Kbr1x7y0q.x53yno3NR2XupWTWIEBeGcD.EgjOdJCINiZJ.adG8Vy', // 1234567890
            'estado' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'usuario3',
            'email' => 'user3@gmail.com',
            'email_verified_at' => now(),
            'profileImage' => 'user4.jpg',
            'isAdmin' => 0,
            'password' => '$2y$10$Kbr1x7y0q.x53yno3NR2XupWTWIEBeGcD.EgjOdJCINiZJ.adG8Vy', // 1234567890
            'estado' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'usuario4',
            'email' => 'user4@gmail.com',
            'email_verified_at' => now(),
            'profileImage' => 'user5.jpg',
            'isAdmin' => 0,
            'password' => '$2y$10$Kbr1x7y0q.x53yno3NR2XupWTWIEBeGcD.EgjOdJCINiZJ.adG8Vy', // 1234567890
            'estado' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'usuario5',
            'email' => 'user5@gmail.com',
            'email_verified_at' => now(),
            'profileImage' => 'admin.jpg',
            'isAdmin' => 0,
            'password' => '$2y$10$Kbr1x7y0q.x53yno3NR2XupWTWIEBeGcD.EgjOdJCINiZJ.adG8Vy', // 1234567890
            'estado' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'profileImage' => 'user1.jpg',
            'isAdmin' => 1,
            'password' => '$2y$10$Kbr1x7y0q.x53yno3NR2XupWTWIEBeGcD.EgjOdJCINiZJ.adG8Vy', // 1234567890
            'estado' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
