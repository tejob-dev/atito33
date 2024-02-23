<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TypeSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeSalleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_type_salles()
    {
        $typeSalles = TypeSalle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('type-salles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.type_salles.index')
            ->assertViewHas('typeSalles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_type_salle()
    {
        $response = $this->get(route('type-salles.create'));

        $response->assertOk()->assertViewIs('app.type_salles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_type_salle()
    {
        $data = TypeSalle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('type-salles.store'), $data);

        $this->assertDatabaseHas('type_salles', $data);

        $typeSalle = TypeSalle::latest('id')->first();

        $response->assertRedirect(route('type-salles.edit', $typeSalle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();

        $response = $this->get(route('type-salles.show', $typeSalle));

        $response
            ->assertOk()
            ->assertViewIs('app.type_salles.show')
            ->assertViewHas('typeSalle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();

        $response = $this->get(route('type-salles.edit', $typeSalle));

        $response
            ->assertOk()
            ->assertViewIs('app.type_salles.edit')
            ->assertViewHas('typeSalle');
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

        $response = $this->put(route('type-salles.update', $typeSalle), $data);

        $data['id'] = $typeSalle->id;

        $this->assertDatabaseHas('type_salles', $data);

        $response->assertRedirect(route('type-salles.edit', $typeSalle));
    }

    /**
     * @test
     */
    public function it_deletes_the_type_salle()
    {
        $typeSalle = TypeSalle::factory()->create();

        $response = $this->delete(route('type-salles.destroy', $typeSalle));

        $response->assertRedirect(route('type-salles.index'));

        $this->assertDeleted($typeSalle);
    }
}
