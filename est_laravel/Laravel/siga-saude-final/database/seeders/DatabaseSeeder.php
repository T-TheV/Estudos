<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paciente;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 2 médicos
        User::factory()->medico()->count(2)->create();

        // 2 recepcionistas
        User::factory()->recepcionista()->count(2)->create();

        // 2 pacientes
        Paciente::factory()->count(2)->create();
    }
}
