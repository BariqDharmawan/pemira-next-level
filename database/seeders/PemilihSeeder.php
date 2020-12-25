<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pemilih;
use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemilih::factory()->times(30)->create();
    }
}
