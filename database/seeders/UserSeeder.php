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
                $profile = new User;
                $profile->nama = 'pemilih' . ($i - 1);
                $profile->email = 'pemilih' . ($i - 1) . '@email.com';
                $profile->role = 'pemilih';
                $profile->password = Hash::make('password');
                $profile->save();

                Pemilih::create([
                    'nim' => 19105110 . $i,
                    'user_id' => $profile->id
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
