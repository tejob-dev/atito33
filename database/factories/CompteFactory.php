<?php

namespace Database\Factories;

use App\Models\Compte;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Compte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_compte' => $this->faker->text(255),
            'prenom_compte' => $this->faker->text(255),
            'telephone_compte' => $this->faker->text(255),
            'whatsapp_compte' => $this->faker->text(255),
            'adresse_compte' => $this->faker->text(255),
            'nom_entreprise' => $this->faker->text(255),
            'siteweb_compte' => $this->faker->text(255),
            'activite_compte' => $this->faker->text(255),
            'logo_entreprise' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
