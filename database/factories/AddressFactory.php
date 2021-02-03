<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Ev', 'İş', 'Okul', 'Anne Ev', 'Baba Ev', 'Diğer']) . ' Adresi',
            'address' => $this->faker->address,
            'post_code' => $this->faker->postcode,
            'city_name' => $this->faker->city,
            'country_name' => $this->faker->country,
        ];
    }
}
