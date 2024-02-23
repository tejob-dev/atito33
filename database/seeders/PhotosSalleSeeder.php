<?php

namespace Database\Seeders;

use App\Models\PhotosSalle;
use Illuminate\Database\Seeder;

class PhotosSalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhotosSalle::factory()
            ->count(5)
            ->create();
    }
}
