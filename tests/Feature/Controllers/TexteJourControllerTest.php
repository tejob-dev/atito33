<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TexteJour;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TexteJourControllerTest extends TestCase
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
    public function it_displays_index_view_with_texte_jours()
    {
        $texteJours = TexteJour::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('texte-jours.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.texte_jours.index')
            ->assertViewHas('texteJours');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_texte_jour()
    {
        $response = $this->get(route('texte-jours.create'));

        $response->assertOk()->assertViewIs('app.texte_jours.create');
    }

    /**
     * @test
     */
    public function it_stores_the_texte_jour()
    {
        $data = TexteJour::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('texte-jours.store'), $data);

        $this->assertDatabaseHas('texte_jours', $data);

        $texteJour = TexteJour::latest('id')->first();

        $response->assertRedirect(route('texte-jours.edit', $texteJour));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_texte_jour()
    {
        $texteJour = TexteJour::factory()->create();

        $response = $this->get(route('texte-jours.show', $texteJour));

        $response
            ->assertOk()
            ->assertViewIs('app.texte_jours.show')
            ->assertViewHas('texteJour');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_texte_jour()
    {
        $texteJour = TexteJour::factory()->create();

        $response = $this->get(route('texte-jours.edit', $texteJour));

        $response
            ->assertOk()
            ->assertViewIs('app.texte_jours.edit')
            ->assertViewHas('texteJour');
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

        $response = $this->put(route('texte-jours.update', $texteJour), $data);

        $data['id'] = $texteJour->id;

        $this->assertDatabaseHas('texte_jours', $data);

        $response->assertRedirect(route('texte-jours.edit', $texteJour));
    }

    /**
     * @test
     */
    public function it_deletes_the_texte_jour()
    {
        $texteJour = TexteJour::factory()->create();

        $response = $this->delete(route('texte-jours.destroy', $texteJour));

        $response->assertRedirect(route('texte-jours.index'));

        $this->assertDeleted($texteJour);
    }
}
