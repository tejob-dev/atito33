<?php

namespace Database\Factories;

use App\Models\PhotosSalle;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotosSalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhotosSalle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre_image' => $this->faker->text(255),
            'description_image' => $this->faker->text(255),
            'photo' => $this->faker->text(255),
        ];
    }
}
