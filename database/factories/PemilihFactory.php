<?php

namespace Database\Factories;

use App\Models\Pemilih;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemilihFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemilih::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $semuaNim = [];
        $akhiran = 1;
        for ($i = 0; $i < 30; $i++) {
            if ($akhiran < 10) {
                $akhiran = '0' . $akhiran;
            } else {
                $akhiran = $akhiran;
            }

            $semuaNim[] = 19105110 . $akhiran;
            $akhiran++;
        }

        return [
            'nim' => $this->faker->randomElement($semuaNim),
            'sudah_memilih' => false,
            'user_id' => $this->faker->randomElement(
                User::select('id')->where('role', 'pemilih')->get()
            )
        ];
    }
}
