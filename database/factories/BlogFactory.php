<?php

namespace Database\Factories;

use App\Models\Category;
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
        return [
            'title' =>$this->faker->name(),
            'description'=>$this->faker->text(20),
            'category_id'=> Category::all()->random()->id,
            'status'=>0,
            // 'profile_image'=>$this->faker->image(),
        ];
    }
}
