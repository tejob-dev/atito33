<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\PhotosSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotosSalleSallesTest extends TestCase
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
    public function it_gets_photos_salle_salles()
    {
        $photosSalle = PhotosSalle::factory()->create();
        $salle = Salle::factory()->create();

        $photosSalle->salles()->attach($salle);

        $response = $this->getJson(
            route('api.photos-salles.salles.index', $photosSalle)
        );

        $response->assertOk()->assertSee($salle->type);
    }

    /**
     * @test
     */
    public function it_can_attach_salles_to_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->postJson(
            route('api.photos-salles.salles.store', [$photosSalle, $salle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $photosSalle
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_salles_from_photos_salle()
    {
        $photosSalle = PhotosSalle::factory()->create();
        $salle = Salle::factory()->create();

        $response = $this->deleteJson(
            route('api.photos-salles.salles.store', [$photosSalle, $salle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $photosSalle
                ->salles()
                ->where('salles.id', $salle->id)
                ->exists()
        );
    }
}
