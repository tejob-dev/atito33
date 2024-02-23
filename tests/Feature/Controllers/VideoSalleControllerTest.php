<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\VideoSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoSalleControllerTest extends TestCase
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
    public function it_displays_index_view_with_video_salles()
    {
        $videoSalles = VideoSalle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('video-salles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.video_salles.index')
            ->assertViewHas('videoSalles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_video_salle()
    {
        $response = $this->get(route('video-salles.create'));

        $response->assertOk()->assertViewIs('app.video_salles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_video_salle()
    {
        $data = VideoSalle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('video-salles.store'), $data);

        $this->assertDatabaseHas('video_salles', $data);

        $videoSalle = VideoSalle::latest('id')->first();

        $response->assertRedirect(route('video-salles.edit', $videoSalle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();

        $response = $this->get(route('video-salles.show', $videoSalle));

        $response
            ->assertOk()
            ->assertViewIs('app.video_salles.show')
            ->assertViewHas('videoSalle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();

        $response = $this->get(route('video-salles.edit', $videoSalle));

        $response
            ->assertOk()
            ->assertViewIs('app.video_salles.edit')
            ->assertViewHas('videoSalle');
    }

    /**
     * @test
     */
    public function it_updates_the_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();

        $data = [
            'lien_video' => $this->faker->text(255),
            'photo' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('video-salles.update', $videoSalle),
            $data
        );

        $data['id'] = $videoSalle->id;

        $this->assertDatabaseHas('video_salles', $data);

        $response->assertRedirect(route('video-salles.edit', $videoSalle));
    }

    /**
     * @test
     */
    public function it_deletes_the_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();

        $response = $this->delete(route('video-salles.destroy', $videoSalle));

        $response->assertRedirect(route('video-salles.index'));

        $this->assertDeleted($videoSalle);
    }
}
