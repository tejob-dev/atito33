<?php

namespace Database\Factories;

use App\Models\Salle;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word,
            'nom_salle' => $this->faker->text(255),
            'adresse_salle' => $this->faker->text(255),
            'presentation_salle' => $this->faker->text,
            'capacite_salle' => $this->faker->randomNumber(0),
            'tarif_salle' => $this->faker->text(255),
            'acces_salle' => $this->faker->text(255),
            'logistique_salle' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'tel_whatsapp' => $this->faker->text(255),
            'email_salle' => $this->faker->text(255),
            'facebook_salle' => $this->faker->text(255),
            'site_internet' => $this->faker->text(255),
            'photo' => $this->faker->text(255),
            'date_salle' => $this->faker->dateTime,
            'commune_id' => \App\Models\Commune::factory(),
            'ville_id' => \App\Models\Ville::factory(),
            'quartier_id' => \App\Models\Quartier::factory(),
        ];
    }
}
