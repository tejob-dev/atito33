<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PhotosSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotosSalleControllerTest extends TestCase
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
    public function it_displays_index_view_with_photos_salles()
    {
        $photosSalles = PhotosSalle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('photos-salles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.photos_salles.index')
            ->assertViewHas('photosSalles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_photos_salle()
    {
        $response = $this->get(route('photos-salles.create'));

        $response->assertOk()->assertViewIs('app.photos_salles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_photos_salle()
    {
        $data = PhotosSalle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('photos-salles.store'), $data);

        $this->assertDatabaseHas('photos_salles', $data);

        $photosSalle = PhotosSalle::latest('id')->first();

        $response->assertRedirect(route('photos-salles.edit', $photosSalle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();

        $response = $this->get(route('photos-salles.show', $photosSalle));

        $response
            ->assertOk()
            ->assertViewIs('app.photos_salles.show')
            ->assertViewHas('photosSalle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();

        $response = $this->get(route('photos-salles.edit', $photosSalle));

        $response
            ->assertOk()
            ->assertViewIs('app.photos_salles.edit')
            ->assertViewHas('photosSalle');
    }

    /**
     * @test
     */
    public function it_updates_the_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();

        $data = [
            'titre_image' => $this->faker->text(255),
            'description_image' => $this->faker->text(255),
            'photo' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('photos-salles.update', $photosSalle),
            $data
        );

        $data['id'] = $photosSalle->id;

        $this->assertDatabaseHas('photos_salles', $data);

        $response->assertRedirect(route('photos-salles.edit', $photosSalle));
    }

    /**
     * @test
     */
    public function it_deletes_the_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();

        $response = $this->delete(route('photos-salles.destroy', $photosSalle));

        $response->assertRedirect(route('photos-salles.index'));

        $this->assertDeleted($photosSalle);
    }
}
