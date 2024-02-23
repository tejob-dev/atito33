<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\Commune;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommuneSallesTest extends TestCase
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
    public function it_gets_commune_salles()
    {
        $commune = Commune::factory()->create();
        $salles = Salle::factory()
            ->count(2)
            ->create([
                'commune_id' => $commune->id,
            ]);

        $response = $this->getJson(
            route('api.communes.salles.index', $commune)
        );

        $response->assertOk()->assertSee($salles[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_commune_salles()
    {
        $commune = Commune::factory()->create();
        $data = Salle::factory()
            ->make([
                'commune_id' => $commune->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.communes.salles.store', $commune),
            $data
        );

        $this->assertDatabaseHas('salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $salle = Salle::latest('id')->first();

        $this->assertEquals($commune->id, $salle->commune_id);
    }
}
