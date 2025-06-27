<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition()
    {
        return [
			'name' => fake()->name(),
			'price' => fake()->name(),
			'features' => fake()->name(),
        ];
    }
}
