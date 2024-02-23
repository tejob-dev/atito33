<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Compte;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompteControllerTest extends TestCase
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
    public function it_displays_index_view_with_comptes()
    {
        $comptes = Compte::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('comptes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.comptes.index')
            ->assertViewHas('comptes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_compte()
    {
        $response = $this->get(route('comptes.create'));

        $response->assertOk()->assertViewIs('app.comptes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_compte()
    {
        $data = Compte::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('comptes.store'), $data);

        $this->assertDatabaseHas('comptes', $data);

        $compte = Compte::latest('id')->first();

        $response->assertRedirect(route('comptes.edit', $compte));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_compte()
    {
        $compte = Compte::factory()->create();

        $response = $this->get(route('comptes.show', $compte));

        $response
            ->assertOk()
            ->assertViewIs('app.comptes.show')
            ->assertViewHas('compte');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_compte()
    {
        $compte = Compte::factory()->create();

        $response = $this->get(route('comptes.edit', $compte));

        $response
            ->assertOk()
            ->assertViewIs('app.comptes.edit')
            ->assertViewHas('compte');
    }

    /**
     * @test
     */
    public function it_updates_the_compte()
    {
        $compte = Compte::factory()->create();

        $user = User::factory()->create();

        $data = [
            'nom_compte' => $this->faker->text(255),
            'prenom_compte' => $this->faker->text(255),
            'telephone_compte' => $this->faker->text(255),
            'whatsapp_compte' => $this->faker->text(255),
            'adresse_compte' => $this->faker->text(255),
            'nom_entreprise' => $this->faker->text(255),
            'siteweb_compte' => $this->faker->text(255),
            'activite_compte' => $this->faker->text(255),
            'logo_entreprise' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->put(route('comptes.update', $compte), $data);

        $data['id'] = $compte->id;

        $this->assertDatabaseHas('comptes', $data);

        $response->assertRedirect(route('comptes.edit', $compte));
    }

    /**
     * @test
     */
    public function it_deletes_the_compte()
    {
        $compte = Compte::factory()->create();

        $response = $this->delete(route('comptes.destroy', $compte));

        $response->assertRedirect(route('comptes.index'));

        $this->assertDeleted($compte);
    }
}
