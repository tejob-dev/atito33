<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Compte;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompteTest extends TestCase
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
    public function it_gets_comptes_list()
    {
        $comptes = Compte::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.comptes.index'));

        $response->assertOk()->assertSee($comptes[0]->nom_compte);
    }

    /**
     * @test
     */
    public function it_stores_the_compte()
    {
        $data = Compte::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.comptes.store'), $data);

        $this->assertDatabaseHas('comptes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.comptes.update', $compte), $data);

        $data['id'] = $compte->id;

        $this->assertDatabaseHas('comptes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_compte()
    {
        $compte = Compte::factory()->create();

        $response = $this->deleteJson(route('api.comptes.destroy', $compte));

        $this->assertDeleted($compte);

        $response->assertNoContent();
    }
}
