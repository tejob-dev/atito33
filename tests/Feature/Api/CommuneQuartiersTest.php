<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Commune;
use App\Models\Quartier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommuneQuartiersTest extends TestCase
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
    public function it_gets_commune_quartiers()
    {
        $commune = Commune::factory()->create();
        $quartiers = Quartier::factory()
            ->count(2)
            ->create([
                'commune_id' => $commune->id,
            ]);

        $response = $this->getJson(
            route('api.communes.quartiers.index', $commune)
        );

        $response->assertOk()->assertSee($quartiers[0]->nom_quartier);
    }

    /**
     * @test
     */
    public function it_stores_the_commune_quartiers()
    {
        $commune = Commune::factory()->create();
        $data = Quartier::factory()
            ->make([
                'commune_id' => $commune->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.communes.quartiers.store', $commune),
            $data
        );

        $this->assertDatabaseHas('quartiers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $quartier = Quartier::latest('id')->first();

        $this->assertEquals($commune->id, $quartier->commune_id);
    }
}
