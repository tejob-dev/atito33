<?php

namespace Database\Seeders;

use App\Models\VideoSalle;
use Illuminate\Database\Seeder;

class VideoSalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VideoSalle::factory()
            ->count(5)
            ->create();
    }
}
