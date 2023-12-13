<?php

namespace Database\Factories;


use App\Models\Hrd;
use App\Models\HrdData;
use App\Models\JobCompany;
use App\Models\JobEducation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hrd_id' => HrdData::all()->random()->id,
            'jobcompany_id' => JobCompany::all()->random()->id,
            'jobeducation_id' => JobEducation::all()->random()->id,
            'position' => $this->faker->jobTitle(),
            'jobdesk' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(30),
            'image' => 'images/hrd/jobs/default.jpg',
            'status' => 1,
            'confirm' => 1
        ];
    }
}
