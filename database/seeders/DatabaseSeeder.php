<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Cria usuários para a aplicação.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
    }
}
