<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'price' => $this->faker->randomDigit,
            'description' => $this->faker->text,
            'user_id' => 1,
            'image' => null,
            'code' => 1111,
            'reference' => $this->faker->text,
            'stock_balance' => 600,
            'categories_id' => 1,
        ];
    }
}
