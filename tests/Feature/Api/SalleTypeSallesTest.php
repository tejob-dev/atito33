<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\TypeSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalleTypeSallesTest extends TestCase
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
    public function it_gets_salle_type_salles()
    {
        $salle = Salle::factory()->create();
        $typeSalle = TypeSalle::factory()->create();

        $salle->typeSalles()->attach($typeSalle);

        $response = $this->getJson(
            route('api.salles.type-salles.index', $salle)
        );

        $response->assertOk()->assertSee($typeSalle->libelle);
    }

    /**
     * @test
     */
    public function it_can_attach_type_salles_to_salle()
    {
        $salle = Salle::factory()->create();
        $typeSalle = TypeSalle::factory()->create();

        $response = $this->postJson(
            route('api.salles.type-salles.store', [$salle, $typeSalle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $salle
                ->typeSalles()
                ->where('type_salles.id', $typeSalle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_type_salles_from_salle()
    {
        $salle = Salle::factory()->create();
        $typeSalle = TypeSalle::factory()->create();

        $response = $this->deleteJson(
            route('api.salles.type-salles.store', [$salle, $typeSalle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $salle
                ->typeSalles()
                ->where('type_salles.id', $typeSalle->id)
                ->exists()
        );
    }
}
