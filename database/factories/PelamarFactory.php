<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pekerjaan;
use App\Models\Pelamar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelamar>
 */
class PelamarFactory extends Factory
{
    protected $model = Pelamar::class;
    public function definition(): array
    {
        return [
            'nama_pelamar' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'alamat' => $this->faker->address(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'pengalaman_kerja' => $this->faker->text,
            'pendidikan_terakhir' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']),
            'keterampilan' => $this->faker->text,

        ];
    }
}
