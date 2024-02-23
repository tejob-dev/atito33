<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TexteJour;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TexteJourTest extends TestCase
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
    public function it_gets_texte_jours_list()
    {
        $texteJours = TexteJour::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.texte-jours.index'));

        $response->assertOk()->assertSee($texteJours[0]->libelle);
    }

    /**
     * @test
     */
    public function it_stores_the_texte_jour()
    {
        $data = TexteJour::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.texte-jours.store'), $data);

        $this->assertDatabaseHas('texte_jours', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_texte_jour()
    {
        $texteJour = TexteJour::factory()->create();

        $data = [
            'libelle' => $this->faker->text(255),
            'texte' => $this->faker->text,
            'fonction_texte' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.texte-jours.update', $texteJour),
            $data
        );

        $data['id'] = $texteJour->id;

        $this->assertDatabaseHas('texte_jours', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_texte_jour()
    {
        $texteJour = TexteJour::factory()->create();

        $response = $this->deleteJson(
            route('api.texte-jours.destroy', $texteJour)
        );

        $this->assertDeleted($texteJour);

        $response->assertNoContent();
    }
}
