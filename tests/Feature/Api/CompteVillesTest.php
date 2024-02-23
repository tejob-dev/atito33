<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ville;
use App\Models\Compte;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompteVillesTest extends TestCase
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
    public function it_gets_compte_villes()
    {
        $compte = Compte::factory()->create();
        $ville = Ville::factory()->create();

        $compte->villes()->attach($ville);

        $response = $this->getJson(route('api.comptes.villes.index', $compte));

        $response->assertOk()->assertSee($ville->nom_ville);
    }

    /**
     * @test
     */
    public function it_can_attach_villes_to_compte()
    {
        $compte = Compte::factory()->create();
        $ville = Ville::factory()->create();

        $response = $this->postJson(
            route('api.comptes.villes.store', [$compte, $ville])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $compte
                ->villes()
                ->where('villes.id', $ville->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_villes_from_compte()
    {
        $compte = Compte::factory()->create();
        $ville = Ville::factory()->create();

        $response = $this->deleteJson(
            route('api.comptes.villes.store', [$compte, $ville])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $compte
                ->villes()
                ->where('villes.id', $ville->id)
                ->exists()
        );
    }
}
