<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ville;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VilleTest extends TestCase
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
    public function it_gets_villes_list()
    {
        $villes = Ville::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.villes.index'));

        $response->assertOk()->assertSee($villes[0]->nom_ville);
    }

    /**
     * @test
     */
    public function it_stores_the_ville()
    {
        $data = Ville::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.villes.store'), $data);

        $this->assertDatabaseHas('villes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ville()
    {
        $ville = Ville::factory()->create();

        $data = [
            'nom_ville' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.villes.update', $ville), $data);

        $data['id'] = $ville->id;

        $this->assertDatabaseHas('villes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ville()
    {
        $ville = Ville::factory()->create();

        $response = $this->deleteJson(route('api.villes.destroy', $ville));

        $this->assertDeleted($ville);

        $response->assertNoContent();
    }
}
