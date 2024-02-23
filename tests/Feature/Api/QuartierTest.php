<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Quartier;

use App\Models\Commune;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuartierTest extends TestCase
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
    public function it_gets_quartiers_list()
    {
        $quartiers = Quartier::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.quartiers.index'));

        $response->assertOk()->assertSee($quartiers[0]->nom_quartier);
    }

    /**
     * @test
     */
    public function it_stores_the_quartier()
    {
        $data = Quartier::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.quartiers.store'), $data);

        $this->assertDatabaseHas('quartiers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_quartier()
    {
        $quartier = Quartier::factory()->create();

        $commune = Commune::factory()->create();

        $data = [
            'nom_quartier' => $this->faker->text(255),
            'commune_id' => $commune->id,
        ];

        $response = $this->putJson(
            route('api.quartiers.update', $quartier),
            $data
        );

        $data['id'] = $quartier->id;

        $this->assertDatabaseHas('quartiers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_quartier()
    {
        $quartier = Quartier::factory()->create();

        $response = $this->deleteJson(
            route('api.quartiers.destroy', $quartier)
        );

        $this->assertDeleted($quartier);

        $response->assertNoContent();
    }
}
