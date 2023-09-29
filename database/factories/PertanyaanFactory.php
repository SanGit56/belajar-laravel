<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pertanyaan>
 */
class PertanyaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tanya' => fake()->sentence(mt_rand(3,8)),
            'jawab' => fake()->sentence(mt_rand(16,24)),
            'user_id' => mt_rand(1,3),
            'kategori_id' => mt_rand(1,2)
        ];
    }
}
