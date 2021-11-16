<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Comer y Beber',
            'slug' => 'comer-y-beber'
        ]);

        Category::create([
            'name' => 'Deporte y fitness',
            'slug' => 'deporte-y-fitness'
        ]);

        Category::create([
            'name' => 'Consejos de Viaje',
            'slug' => 'consejos-de-viaje'
        ]);

        Category::create([
            'name' => 'Playa',
            'slug' => 'playa'
        ]);

        Category::create([
            'name' => 'Naturaleza',
            'slug' => 'naturaleza'
        ]);

        Category::create([
            'name' => 'Destinos',
            'slug' => 'destinos',
        ]);

        Category::create([
            'name' => 'Viajes Familiares',
            'slug' => 'viajes-familiares'
        ]);

        Category::create([
            'name' => 'El futuro de los viajes',
            'slug' => 'el-futuro-de-los-viajes'
        ]);
    }
}
