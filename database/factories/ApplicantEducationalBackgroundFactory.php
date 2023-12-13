<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantEducationalBackground>
 */
class ApplicantEducationalBackgroundFactory extends Factory
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
            'institution' => $this->faker->company,
            'major' => $this->faker->word,
            'title' => $this->faker->sentence,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
        ];
    }
}
