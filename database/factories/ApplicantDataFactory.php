<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantData>
 */
class ApplicantDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'applicant')->inRandomOrder()->firstOrFail()->id,
            'ktp_number' => $this->faker->unique()->numerify('##############'),
            'full_name' => $this->faker->name,
            'place_of_birth' => $this->faker->city,
            'date_of_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['Pria', 'Wanita']),
            'marital_status' => $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
        ];
    }
}
