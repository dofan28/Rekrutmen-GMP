<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\ApplicantWorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantWorkExperience>
 */
class ApplicantWorkExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'applicant_id' => Applicant::all()->random()->id,
            'company' => $this->faker->company,
            'position' => $this->faker->jobTitle,
            'last_salary' => $this->faker->numberBetween(20000, 100000),
            'job_description' => $this->faker->text,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
        ];
    }
}
