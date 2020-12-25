<?php

namespace Database\Seeders;

use App\Models\Calon;
use Illuminate\Database\Seeder;

class CalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calon::factory()->times(5)->create();
    }
}
