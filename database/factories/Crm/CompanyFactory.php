<?php

namespace Database\Factories\Crm;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'state' => $this->faker->languageCode(),
            'address'=> $this->faker->address(),
            'active' => rand(0,1),
            'last_action_at'=> $this->faker->dateTime
        ];
    }
}
