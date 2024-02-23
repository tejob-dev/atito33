<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Salle;

use App\Models\Ville;
use App\Models\Commune;
use App\Models\Quartier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_salles()
    {
        $salles = Salle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('salles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.salles.index')
            ->assertViewHas('salles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_salle()
    {
        $response = $this->get(route('salles.create'));

        $response->assertOk()->assertViewIs('app.salles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_salle()
    {
        $data = Salle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('salles.store'), $data);

        $this->assertDatabaseHas('salles', $data);

        $salle = Salle::latest('id')->first();

        $response->assertRedirect(route('salles.edit', $salle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_salle()
    {
        $salle = Salle::factory()->create();

        $response = $this->get(route('salles.show', $salle));

        $response
            ->assertOk()
            ->assertViewIs('app.salles.show')
            ->assertViewHas('salle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_salle()
    {
        $salle = Salle::factory()->create();

        $response = $this->get(route('salles.edit', $salle));

        $response
            ->assertOk()
            ->assertViewIs('app.salles.edit')
            ->assertViewHas('salle');
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

        $response = $this->put(route('salles.update', $salle), $data);

        $data['id'] = $salle->id;

        $this->assertDatabaseHas('salles', $data);

        $response->assertRedirect(route('salles.edit', $salle));
    }

    /**
     * @test
     */
    public function it_deletes_the_salle()
    {
        $salle = Salle::factory()->create();

        $response = $this->delete(route('salles.destroy', $salle));

        $response->assertRedirect(route('salles.index'));

        $this->assertDeleted($salle);
    }
}
