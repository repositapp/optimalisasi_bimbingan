<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Judul>
 */
class JudulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mahasiswa_id' => mt_rand(1, 15),
            'pembimbing1_id' => mt_rand(1, 25),
            'pembimbing2_id' => mt_rand(1, 25),
            'penguji1_id' => mt_rand(1, 25),
            'penguji2_id' => mt_rand(1, 25),
            'penguji3_id' => mt_rand(1, 25),
            'judul' => $this->faker->sentence(mt_rand(2, 8)),
            'keterangan' => $this->faker->paragraph(),
            'sk_pembimbing' => 'sk-images/saskian-SK-Pembimbing.pdf',
            'sk_penguji' => 'sk-images/saskian-SK-Penguji.pdf',
        ];
    }
}
