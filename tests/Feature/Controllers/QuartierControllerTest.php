<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Quartier;

use App\Models\Commune;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuartierControllerTest extends TestCase
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
    public function it_displays_index_view_with_quartiers()
    {
        $quartiers = Quartier::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('quartiers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.quartiers.index')
            ->assertViewHas('quartiers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_quartier()
    {
        $response = $this->get(route('quartiers.create'));

        $response->assertOk()->assertViewIs('app.quartiers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_quartier()
    {
        $data = Quartier::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('quartiers.store'), $data);

        $this->assertDatabaseHas('quartiers', $data);

        $quartier = Quartier::latest('id')->first();

        $response->assertRedirect(route('quartiers.edit', $quartier));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_quartier()
    {
        $quartier = Quartier::factory()->create();

        $response = $this->get(route('quartiers.show', $quartier));

        $response
            ->assertOk()
            ->assertViewIs('app.quartiers.show')
            ->assertViewHas('quartier');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_quartier()
    {
        $quartier = Quartier::factory()->create();

        $response = $this->get(route('quartiers.edit', $quartier));

        $response
            ->assertOk()
            ->assertViewIs('app.quartiers.edit')
            ->assertViewHas('quartier');
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

        $response = $this->put(route('quartiers.update', $quartier), $data);

        $data['id'] = $quartier->id;

        $this->assertDatabaseHas('quartiers', $data);

        $response->assertRedirect(route('quartiers.edit', $quartier));
    }

    /**
     * @test
     */
    public function it_deletes_the_quartier()
    {
        $quartier = Quartier::factory()->create();

        $response = $this->delete(route('quartiers.destroy', $quartier));

        $response->assertRedirect(route('quartiers.index'));

        $this->assertDeleted($quartier);
    }
}
