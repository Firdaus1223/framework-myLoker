<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelamar;
use App\Models\Pekerjaan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pekerjaan>
 */
class PekerjaanFactory extends Factory
{

    public function definition(): array
    {
        return [

            'posisi' => $this->faker->randomElement(['Front End', 'Back End', 'Designer', 'Developer', 'UI UX', 'System Analyst']),
            'pekerjaan_id' => $this->faker->unique()->numberBetween(100000000000, 999999999999),
            'lokasi' => $this->faker->address(),
            'deskripsi' => $this->faker->text,
            'gaji' => $this->faker->numberBetween(3000, 10000),
            'tanggal_posting' => $this->faker->date(),
            'email_id' => Pelamar::all()->random()->id,
            'gambar' => $this->faker->imageUrl(),
        ];
    }
}
