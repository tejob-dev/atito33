<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ville;
use App\Models\Commune;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VilleCommunesTest extends TestCase
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
    public function it_gets_ville_communes()
    {
        $ville = Ville::factory()->create();
        $communes = Commune::factory()
            ->count(2)
            ->create([
                'ville_id' => $ville->id,
            ]);

        $response = $this->getJson(route('api.villes.communes.index', $ville));

        $response->assertOk()->assertSee($communes[0]->nom_commune);
    }

    /**
     * @test
     */
    public function it_stores_the_ville_communes()
    {
        $ville = Ville::factory()->create();
        $data = Commune::factory()
            ->make([
                'ville_id' => $ville->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.villes.communes.store', $ville),
            $data
        );

        $this->assertDatabaseHas('communes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $commune = Commune::latest('id')->first();

        $this->assertEquals($ville->id, $commune->ville_id);
    }
}
