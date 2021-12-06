<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tag;
use Database\Factories\TagImageFactory;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tag::create([
            'name' => 'Cartagena de Indias',
            'slug' => 'cartagena-de-indias',
            'color' => 'red'
        ]);

        Tag::create([
            'name' => 'Santa Marta',
            'slug' => 'santa-marta',
            'color' => 'indigo'
        ]);

        Tag::create([
            'name' => 'San Andrés',
            'slug' => 'san-andres',
            'color' => 'blue'
        ]);

        Tag::create([
            'name' => 'Bogotá',
            'slug' => 'bogota',
            'color' => 'yellow'
        ]);

        Tag::create([
            'name' => 'Medellín',
            'slug' => 'medellin',
            'color' => 'green'
        ]);

        Tag::create([
            'name' => 'Barranquilla',
            'slug' => 'barranquilla',
            'color' => 'purple'
        ]);

        Tag::create([
            'name' => 'Melgar',
            'slug' => 'melgar',
            'color' => 'pink'
        ]);


        Tag::create([
            'name' => 'Villa de Leyva',
            'slug' => 'villa-de-leyva',
            'color' => 'gray'
        ]);

        Tag::create([
            'name' => 'Girardot',
            'slug' => 'girardot',
            'color' => 'red'
        ]);

        Tag::create([
            'name' => 'Cali',
            'slug' => 'cali',
            'color' => 'yellow'
        ]);

        Tag::factory(8)->create();
    }
}
