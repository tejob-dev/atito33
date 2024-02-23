<?php

namespace Database\Factories;

use App\Models\VideoSalle;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoSalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VideoSalle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lien_video' => $this->faker->text(255),
            'photo' => $this->faker->text(255),
        ];
    }
}
