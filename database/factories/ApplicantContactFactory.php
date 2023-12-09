<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\ApplicantContact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantContact>
 */
class ApplicantContactFactory extends Factory
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
            'street' => $this->faker->streetAddress,
            'subdistrict' => $this->faker->city,
            'city' => $this->faker->city,
            'province' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'linkedin' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
        ];
    }
}
