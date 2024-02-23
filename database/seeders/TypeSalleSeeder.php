<?php

namespace Database\Seeders;

use App\Models\TypeSalle;
use Illuminate\Database\Seeder;

class TypeSalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeSalle::factory()
            ->count(5)
            ->create();
    }
}
