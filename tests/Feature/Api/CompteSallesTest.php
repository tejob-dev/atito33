<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\Compte;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompteSallesTest extends TestCase
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
    public function it_gets_compte_salles()
    {
        $compte = Compte::factory()->create();
        $salle = Salle::factory()->create();

        $compte->salles()->attach($salle);

        $response = $this->getJson(route('api.comptes.salles.index', $compte));

        $response->assertOk()->assertSee($salle->type);
    }

    /**
     * @test
     */
    public function it_can_attach_salles_to_compte()
    {
        $compte = Compte::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->postJson(
            route('api.comptes.salles.store', [$compte, $salle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $compte
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_salles_from_compte()
    {
        $compte = Compte::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->deleteJson(
            route('api.comptes.salles.store', [$compte, $salle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $compte
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }
}
