<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $blog_name = $this->faker->unique()->words($nb = 4, $asText = true);
        $slug = Str::slug($blog_name);
        return [

            'title' => $blog_name,
            'slug' => $slug,
            'body' => $this->faker->text(700),
            'author' => $this->faker->name,
            'image' => 'productimage' . $this->faker->unique()->numberBetween(1, 10) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
