<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::factory()->create();
        Calon::factory()->count(3)->for($user)->create();
    }
}
