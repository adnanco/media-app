<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Person::factory()->count(10)->has(Address::factory()->count(4))->create();
        //Person::factory(10)->create();
        // Address::factory(50)->create();
    }
}
