<?php

namespace Database\Seeders;

use App\Models\Paciente;
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
        Paciente::factory(30)->create();
    }
}
