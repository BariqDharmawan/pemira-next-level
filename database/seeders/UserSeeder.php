<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Calon;
use App\Models\Pemilih;
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
        User::create([
            'nama' => 'admin pemira',
            'email' => 'admin@pemira.co.id',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        for ($i = 2; $i <= 10; $i++) {

            if ($i <= 7) {
                User::create([
                    'nama' => 'pemilih' . ($i - 1),
                    'email' => "pemilih$i@email.com",
                    'role' => 'pemilih',
                    'password' => Hash::make('password'),
                ]);

                Pemilih::create([
                    'nim' => 19105110 . $i,
                    'sudah_memilih' => false,
                    'user_id' => $i
                ]);
            } else {
                User::create([
                    'nama' => "calon $i",
                    'email' => "calon$i@email.com",
                    'role' => 'calon',
                    'password' => Hash::make('password'),
                ]);

                Calon::create([
                    'visi' => "visi calon $i",
                    'misi' => "misi calon $i",
                    'foto' => 'calon.png',
                    'user_id' => $i
                ]);
            }
        }
    }
}
