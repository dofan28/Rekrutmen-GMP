<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
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
            'job_id' => Job::all()->random()->id,
            'applicant_letter' =>$this->faker->sentence(30),
            'company_letter' => $this->faker->sentence(30),
            'cv' => '',
            'confirm' => mt_rand(0, 1),
            'status' => mt_rand(-1, 1), // sementara
        ];
    }
}
