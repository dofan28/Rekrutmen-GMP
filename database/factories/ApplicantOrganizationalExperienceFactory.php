<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantOrganizationalExperience>
 */
class ApplicantOrganizationalExperienceFactory extends Factory
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
            'organizational_name' => $this->faker->company,
            'position' => $this->faker->jobTitle,
            'organizational_description' => $this->faker->text,
        ];
    }
}
