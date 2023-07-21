<?php

namespace Database\Factories\System;

use App\Models\Crm\Company;
use App\Models\Purchases\Vendor;
use App\Models\System\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\System\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = Status::where('type','client')->value('id');
        return [
            'name' => $this->faker->name(),
            'phones' => $this->faker->e164PhoneNumber(),
            'website' => $this->faker->freeEmailDomain(),
            'status_id'=> $status
        ];
    }
}
