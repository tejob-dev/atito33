<?php

namespace Database\Factories;

use App\Models\TexteJour;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TexteJourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TexteJour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->text(255),
            'texte' => $this->faker->text,
            'fonction_texte' => $this->faker->text(255),
        ];
    }
}
