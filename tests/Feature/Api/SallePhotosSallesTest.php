<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\PhotosSalle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SallePhotosSallesTest extends TestCase
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
    public function it_gets_salle_photos_salles()
    {
        $salle = Salle::factory()->create();
        $photosSalle = PhotosSalle::factory()->create();

        $salle->photosSalles()->attach($photosSalle);

        $response = $this->getJson(
            route('api.salles.photos-salles.index', $salle)
        );

        $response->assertOk()->assertSee($photosSalle->titre_image);
    }

    /**
     * @test
     */
    public function it_can_attach_photos_salles_to_salle()
    {
        $salle = Salle::factory()->create();
        $photosSalle = PhotosSalle::factory()->create();

        $response = $this->postJson(
            route('api.salles.photos-salles.store', [$salle, $photosSalle])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $salle
                ->photosSalles()
                ->where('photos_salles.id', $photosSalle->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_photos_salles_from_salle()
    {
        $salle = Salle::factory()->create();
        $photosSalle = PhotosSalle::factory()->create();

        $response = $this->deleteJson(
            route('api.salles.photos-salles.store', [$salle, $photosSalle])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $salle
                ->photosSalles()
                ->where('photos_salles.id', $photosSalle->id)
                ->exists()
        );
    }
}
