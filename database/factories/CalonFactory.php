<?php

namespace Database\Factories;

use App\Models\Calon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Calon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'visi' => $this->faker->paragraph(5),
            'misi' => $this->faker->sentence(10),
            'jumlah_pemilih' => 0,
            'foto' => 'calon.png',
            'user_id' => $this->faker->randomElement([5, 6, 7, 8, 9])
        ];
    }
}
