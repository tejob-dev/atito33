<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\VideoSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalleVideoSallesTest extends TestCase
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
    public function it_gets_salle_video_salles()
    {
        $salle = Salle::factory()->create();
        $videoSalle = VideoSalle::factory()->create();

        $salle->videoSalles()->attach($videoSalle);

        $response = $this->getJson(
            route('api.salles.video-salles.index', $salle)
        );

        $response->assertOk()->assertSee($videoSalle->lien_video);
    }

    /**
     * @test
     */
    public function it_can_attach_video_salles_to_salle()
    {
        $salle = Salle::factory()->create();
        $videoSalle = VideoSalle::factory()->create();

        $response = $this->postJson(
            route('api.salles.video-salles.store', [$salle, $videoSalle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $salle
                ->videoSalles()
                ->where('video_salles.id', $videoSalle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_video_salles_from_salle()
    {
        $salle = Salle::factory()->create();
        $videoSalle = VideoSalle::factory()->create();

        $response = $this->deleteJson(
            route('api.salles.video-salles.store', [$salle, $videoSalle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $salle
                ->videoSalles()
                ->where('video_salles.id', $videoSalle->id)
                ->exists()
        );
    }
}
