<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Accounting\Account;

use App\Models\Crm\Action;
use App\Models\Crm\Company;
use App\Models\Hr\Department;
use App\Models\Hr\Employee;
use App\Models\Hr\JopTitle;
use App\Models\Inventory\Inventory;
use App\Models\Inventory\Product;
use App\Models\Purchases\Vendor;
use App\Models\Sales\Client;
use App\Models\System\Contact;
use App\Models\System\Location;
use App\Models\System\Tag;
use App\Models\System\Tax;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ConstantsSeeder::class);


//        Currency::factory(3)->create();
//        Country::factory(3)->create();
//        State::factory(3)->create();
//        Setting::factory(3)->create();
//        Status::factory(50)->create();
        Tax::factory(2)->create();
        Category::factory(200)->create();
        \App\Models\User::factory(3)->create();
        Account::factory(500)->create();
//        Entry::factory(20000)->create();
        Action::factory(10)->create();
        Company::factory(5)->create();
//        Contact::factory(20)->create();
        Department::factory(5)->create();
        Employee::factory(5)->create();
        Inventory::factory(2)->create();
        Product::factory(50)->create();
//        Vendor::factory(10)->create();
        Client::factory(10)->create();
        JopTitle::factory(50)->create();
        Tag::factory(10)->create();

        Artisan::call('passport:install');

        Vendor::factory()->count(10)->create()->each(function ($vendor) {
            // For each user, create 1-3 contacts
            $count = rand(1, 3);
            Contact::factory()->count($count)->create([
                'contactable_id' => $vendor->id,
                'contactable_type' => Vendor::class,
            ]);
            Location::factory()->count($count)->create([
                'locationable_id' => $vendor->id,
                'locationable_type' => Vendor::class,
            ]);
        });

        $tags = Tag::all();
        Vendor::all()->each(function ($vendor) use ($tags) {
            $vendor->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
