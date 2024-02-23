<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VilleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ville::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_ville' => $this->faker->text(255),
        ];
    }
}
