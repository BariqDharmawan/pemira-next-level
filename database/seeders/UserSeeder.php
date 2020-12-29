<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->times(9)->create();
    }
}
