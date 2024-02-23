<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TypeSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeSalleTest extends TestCase
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
    public function it_gets_type_salles_list()
    {
        $typeSalles = TypeSalle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.type-salles.index'));

        $response->assertOk()->assertSee($typeSalles[0]->libelle);
    }

    /**
     * @test
     */
    public function it_stores_the_type_salle()
    {
        $data = TypeSalle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.type-salles.store'), $data);

        $this->assertDatabaseHas('type_salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();

        $data = [
            'libelle' => $this->faker->text(255),
            'description' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.type-salles.update', $typeSalle),
            $data
        );

        $data['id'] = $typeSalle->id;

        $this->assertDatabaseHas('type_salles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();

        $response = $this->deleteJson(
            route('api.type-salles.destroy', $typeSalle)
        );

        $this->assertDeleted($typeSalle);

        $response->assertNoContent();
    }
}
