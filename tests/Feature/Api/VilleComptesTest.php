<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ville;
use App\Models\Compte;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VilleComptesTest extends TestCase
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
    public function it_gets_ville_comptes()
    {
        $ville = Ville::factory()->create();
        $compte = Compte::factory()->create();

        $ville->comptes()->attach($compte);

        $response = $this->getJson(route('api.villes.comptes.index', $ville));

        $response->assertOk()->assertSee($compte->nom_compte);
    }

    /**
     * @test
     */
    public function it_can_attach_comptes_to_ville()
    {
        $ville = Ville::factory()->create();
        $compte = Compte::factory()->create();

        $response = $this->postJson(
            route('api.villes.comptes.store', [$ville, $compte])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $ville
                ->comptes()
                ->where('comptes.id', $compte->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_comptes_from_ville()
    {
        $ville = Ville::factory()->create();
        $compte = Compte::factory()->create();

        $response = $this->deleteJson(
            route('api.villes.comptes.store', [$ville, $compte])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $ville
                ->comptes()
                ->where('comptes.id', $compte->id)
                ->exists()
        );
    }
}
