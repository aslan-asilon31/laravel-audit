<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
			'role_id' => fake()->name(),
			'price_id' => fake()->name(),
			'title' => fake()->name(),
			'description' => fake()->name(),
        ];
    }
}
