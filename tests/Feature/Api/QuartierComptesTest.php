<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Compte;
use App\Models\Quartier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuartierComptesTest extends TestCase
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
    public function it_gets_quartier_comptes()
    {
        $quartier = Quartier::factory()->create();
        $compte = Compte::factory()->create();

        $quartier->comptes()->attach($compte);

        $response = $this->getJson(
            route('api.quartiers.comptes.index', $quartier)
        );

        $response->assertOk()->assertSee($compte->nom_compte);
    }

    /**
     * @test
     */
    public function it_can_attach_comptes_to_quartier()
    {
        $quartier = Quartier::factory()->create();
        $compte = Compte::factory()->create();

        $response = $this->postJson(
            route('api.quartiers.comptes.store', [$quartier, $compte])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $quartier
                ->comptes()
                ->where('comptes.id', $compte->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_comptes_from_quartier()
    {
        $quartier = Quartier::factory()->create();
        $compte = Compte::factory()->create();

        $response = $this->deleteJson(
            route('api.quartiers.comptes.store', [$quartier, $compte])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $quartier
                ->comptes()
                ->where('comptes.id', $compte->id)
                ->exists()
        );
    }
}
