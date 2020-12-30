<?php

namespace Database\Factories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jadwal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tgl' => $this->faker->date(),
            'judul' => $this->faker->sentence(),
            'jam_mulai' => $this->faker->time(),
            'jam_selesai' => $this->faker->time()
        ];
    }
}
