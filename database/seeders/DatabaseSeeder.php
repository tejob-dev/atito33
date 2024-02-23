<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(CommuneSeeder::class);
        $this->call(CompteSeeder::class);
        $this->call(PhotosSalleSeeder::class);
        $this->call(QuartierSeeder::class);
        $this->call(SalleSeeder::class);
        $this->call(TexteJourSeeder::class);
        $this->call(TypeSalleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VideoSalleSeeder::class);
        $this->call(VilleSeeder::class);
    }
}
