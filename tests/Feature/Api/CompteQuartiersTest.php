<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Compte;
use App\Models\Quartier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompteQuartiersTest extends TestCase
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
    public function it_gets_compte_quartiers()
    {
        $compte = Compte::factory()->create();
        $quartier = Quartier::factory()->create();

        $compte->quartiers()->attach($quartier);

        $response = $this->getJson(
            route('api.comptes.quartiers.index', $compte)
        );

        $response->assertOk()->assertSee($quartier->nom_quartier);
    }

    /**
     * @test
     */
    public function it_can_attach_quartiers_to_compte()
    {
        $compte = Compte::factory()->create();
        $quartier = Quartier::factory()->create();

        $response = $this->postJson(
            route('api.comptes.quartiers.store', [$compte, $quartier])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $compte
                ->quartiers()
                ->where('quartiers.id', $quartier->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_quartiers_from_compte()
    {
        $compte = Compte::factory()->create();
        $quartier = Quartier::factory()->create();

        $response = $this->deleteJson(
            route('api.comptes.quartiers.store', [$compte, $quartier])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $compte
                ->quartiers()
                ->where('quartiers.id', $quartier->id)
                ->exists()
        );
    }
}
