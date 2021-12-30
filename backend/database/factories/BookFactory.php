<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {        
        return [
            'title' => $this->faker->sentence($this->faker->numberBetween(3,5)),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(3),
            'image_url' => $this->faker->imageUrl(640, 480, null, true),
            'amount' =>  $this->faker->randomNumber(5), 
            'isbn' => $this->faker->isbn10(),
            'seller_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
