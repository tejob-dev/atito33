<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\Quartier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuartierSallesTest extends TestCase
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
    public function it_gets_quartier_salles()
    {
        $quartier = Quartier::factory()->create();
        $salles = Salle::factory()
            ->count(2)
            ->create([
                'quartier_id' => $quartier->id,
            ]);

        $response = $this->getJson(
            route('api.quartiers.salles.index', $quartier)
        );

        $response->assertOk()->assertSee($salles[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_quartier_salles()
    {
        $quartier = Quartier::factory()->create();
        $data = Salle::factory()
            ->make([
                'quartier_id' => $quartier->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.quartiers.salles.store', $quartier),
            $data
        );

        $this->assertDatabaseHas('salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $salle = Salle::latest('id')->first();

        $this->assertEquals($quartier->id, $salle->quartier_id);
    }
}
