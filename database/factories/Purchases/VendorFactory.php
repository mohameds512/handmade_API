<?php

namespace Database\Factories\Purchases;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'business_name' => $this->faker->company(),
            'last_name' => $this->faker->lastName(),
            'code' => $this->faker->postcode(),
            'telephone' => $this->faker->phoneNumber(),
            'phone' => $this->faker->e164PhoneNumber(),
            'email'  => fake()->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'cr' => $this->faker->numerify(),
            'tax_number' => $this->faker->randomNumber(),
            'city' => $this->faker->city(),
            'state_id' => 1
        ];
    }
}
