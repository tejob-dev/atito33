<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PhotosSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotosSalleTest extends TestCase
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
    public function it_gets_photos_salles_list()
    {
        $photosSalles = PhotosSalle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.photos-salles.index'));

        $response->assertOk()->assertSee($photosSalles[0]->titre_image);
    }

    /**
     * @test
     */
    public function it_stores_the_photos_salle()
    {
        $data = PhotosSalle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.photos-salles.store'), $data);

        $this->assertDatabaseHas('photos_salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.photos-salles.update', $photosSalle),
            $data
        );

        $data['id'] = $photosSalle->id;

        $this->assertDatabaseHas('photos_salles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();

        $response = $this->deleteJson(
            route('api.photos-salles.destroy', $photosSalle)
        );

        $this->assertDeleted($photosSalle);

        $response->assertNoContent();
    }
}
