<?php

namespace Database\Factories;

use App\Models\Commune;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommuneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commune::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_commune' => $this->faker->text(255),
            'ville_id' => \App\Models\Ville::factory(),
        ];
    }
}
