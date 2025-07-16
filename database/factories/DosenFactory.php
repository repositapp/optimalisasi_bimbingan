<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['Laki-Laki', 'Perempuan']);
        return [
            'user_id' => mt_rand(4, 29),
            'nidn' => mt_rand(111111, 999999),
            'nama_dosen' => $this->faker->name($gender),
            'jenis_kelamin' => $gender,
            'alamat_dosen' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon' => $this->faker->phoneNumber(),
            'pendidikan_terakhir' => 'S1',
            'bidang_ilmu' => 'Teknik Informatika',
        ];
    }
}
