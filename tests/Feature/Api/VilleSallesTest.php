<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ville;
use App\Models\Salle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VilleSallesTest extends TestCase
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
    public function it_gets_ville_salles()
    {
        $ville = Ville::factory()->create();
        $salles = Salle::factory()
            ->count(2)
            ->create([
                'ville_id' => $ville->id,
            ]);

        $response = $this->getJson(route('api.villes.salles.index', $ville));

        $response->assertOk()->assertSee($salles[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_ville_salles()
    {
        $ville = Ville::factory()->create();
        $data = Salle::factory()
            ->make([
                'ville_id' => $ville->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.villes.salles.store', $ville),
            $data
        );

        $this->assertDatabaseHas('salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $salle = Salle::latest('id')->first();

        $this->assertEquals($ville->id, $salle->ville_id);
    }
}
