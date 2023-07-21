<?php

namespace Database\Factories\Inventory;

use App\Models\Hr\Employee;
use App\Models\Inventory\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Inventory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->faker->address(),
            'manager_id' => Employee::all()->random(1)->first()->id,
        ];
    }
}
