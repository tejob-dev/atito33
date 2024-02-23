<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;

use App\Models\Ville;
use App\Models\Commune;
use App\Models\Quartier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_salles_list()
    {
        $salles = Salle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.salles.index'));

        $response->assertOk()->assertSee($salles[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_salle()
    {
        $data = Salle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.salles.store'), $data);

        $this->assertDatabaseHas('salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_salle()
    {
        $salle = Salle::factory()->create();

        $commune = Commune::factory()->create();
        $ville = Ville::factory()->create();
        $quartier = Quartier::factory()->create();

        $data = [
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
            'commune_id' => $commune->id,
            'ville_id' => $ville->id,
            'quartier_id' => $quartier->id,
        ];

        $response = $this->putJson(route('api.salles.update', $salle), $data);

        $data['id'] = $salle->id;

        $this->assertDatabaseHas('salles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_salle()
    {
        $salle = Salle::factory()->create();

        $response = $this->deleteJson(route('api.salles.destroy', $salle));

        $this->assertDeleted($salle);

        $response->assertNoContent();
    }
}
