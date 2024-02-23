<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\TypeSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeSalleSallesTest extends TestCase
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
    public function it_gets_type_salle_salles()
    {
        $typeSalle = TypeSalle::factory()->create();
        $salle = Salle::factory()->create();

        $typeSalle->salles()->attach($salle);

        $response = $this->getJson(
            route('api.type-salles.salles.index', $typeSalle)
        );

        $response->assertOk()->assertSee($salle->type);
    }

    /**
     * @test
     */
    public function it_can_attach_salles_to_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->postJson(
            route('api.type-salles.salles.store', [$typeSalle, $salle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $typeSalle
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_salles_from_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->deleteJson(
            route('api.type-salles.salles.store', [$typeSalle, $salle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $typeSalle
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }
}
