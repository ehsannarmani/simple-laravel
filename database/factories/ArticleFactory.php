<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'title'=>$faker->text(20),
            'body'=>$faker->paragraph(rand(5,10)),
            'slug'=>$faker->slug(),
        ];
    }
}
