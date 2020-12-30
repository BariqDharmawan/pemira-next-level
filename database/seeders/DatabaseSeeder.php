<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CalonSeeder;
use Database\Seeders\PemilihSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            JadwalSeeder::class
        ]);
    }
}
