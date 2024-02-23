<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\VideoSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoSalleSallesTest extends TestCase
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
    public function it_gets_video_salle_salles()
    {
        $videoSalle = VideoSalle::factory()->create();
        $salle = Salle::factory()->create();

        $videoSalle->salles()->attach($salle);

        $response = $this->getJson(
            route('api.video-salles.salles.index', $videoSalle)
        );

        $response->assertOk()->assertSee($salle->type);
    }

    /**
     * @test
     */
    public function it_can_attach_salles_to_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->postJson(
            route('api.video-salles.salles.store', [$videoSalle, $salle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $videoSalle
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_salles_from_video_salle()
    {
        $videoSalle = VideoSalle::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->deleteJson(
            route('api.video-salles.salles.store', [$videoSalle, $salle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $videoSalle
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }
}
