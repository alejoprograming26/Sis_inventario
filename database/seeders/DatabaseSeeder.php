<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Sucursal::factory(10)->create();
        \App\Models\Categoria::factory(100)->create();
        \App\Models\User::factory()->create([
            'name' => 'Alejandro Alvarez',
            'email' => 'josele260403@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
