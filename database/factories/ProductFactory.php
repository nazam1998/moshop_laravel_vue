<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'description' => $this->faker->realText(),
            'cover_path' => 'mockup.jpg',
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5000),
            'stock' => $this->faker->randomDigitNotNull(),
            'shop_id' => Shop::inRandomOrder()->first()->id
        ];
    }
}
