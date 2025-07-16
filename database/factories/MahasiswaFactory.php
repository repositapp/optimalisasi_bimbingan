<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
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
            'user_id' => mt_rand(30, 45),
            'npm' => mt_rand(11111, 99999),
            'nama_mahasiswa' => $this->faker->name($gender),
            'jenis_kelamin' => $gender,
            'alamat_mahasiswa' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon' => $this->faker->phoneNumber(),
            'kelas' => 'A',
            'angkatan' => '2021',
        ];
    }
}
