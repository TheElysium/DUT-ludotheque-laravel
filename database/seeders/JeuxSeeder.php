<?php

namespace Database\Seeders;

use App\Models\Jeu;
use Illuminate\Database\Seeder;

class JeuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jeu::factory(10)->create();
    }
}
