<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\VideoSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoSalleTest extends TestCase
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
    public function it_gets_video_salles_list()
    {
        $videoSalles = VideoSalle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.video-salles.index'));

        $response->assertOk()->assertSee($videoSalles[0]->lien_video);
    }

    /**
     * @test
     */
    public function it_stores_the_video_salle()
    {
        $data = VideoSalle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.video-salles.store'), $data);

        $this->assertDatabaseHas('video_salles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.video-salles.update', $videoSalle),
            $data
        );

        $data['id'] = $videoSalle->id;

        $this->assertDatabaseHas('video_salles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();

        $response = $this->deleteJson(
            route('api.video-salles.destroy', $videoSalle)
        );

        $this->assertDeleted($videoSalle);

        $response->assertNoContent();
    }
}
