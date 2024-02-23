<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\Compte;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalleComptesTest extends TestCase
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
    public function it_gets_salle_comptes()
    {
        $salle = Salle::factory()->create();
        $compte = Compte::factory()->create();

        $salle->comptes()->attach($compte);

        $response = $this->getJson(route('api.salles.comptes.index', $salle));

        $response->assertOk()->assertSee($compte->nom_compte);
    }

    /**
     * @test
     */
    public function it_can_attach_comptes_to_salle()
    {
        $salle = Salle::factory()->create();
        $compte = Compte::factory()->create();

        $response = $this->postJson(
            route('api.salles.comptes.store', [$salle, $compte])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $salle
                ->comptes()
                ->where('comptes.id', $compte->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_comptes_from_salle()
    {
        $salle = Salle::factory()->create();
        $compte = Compte::factory()->create();

        $response = $this->deleteJson(
            route('api.salles.comptes.store', [$salle, $compte])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $salle
                ->comptes()
                ->where('comptes.id', $compte->id)
                ->exists()
        );
    }
}
