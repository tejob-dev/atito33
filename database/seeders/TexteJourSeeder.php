<?php

namespace Database\Seeders;

use App\Models\TexteJour;
use Illuminate\Database\Seeder;

class TexteJourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TexteJour::factory()
            ->count(5)
            ->create();
    }
}
