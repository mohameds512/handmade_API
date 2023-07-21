<?php

namespace Database\Factories\System;


use App\Models\System\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => Status::$TYPES[rand(0,5)],
        ];
    }
}
