<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Crear NuevaCarpeta

        Storage::deleteDirectory('posts');
        Storage::deleteDirectory('tags');

        Storage::makeDirectory('posts');
        Storage::makeDirectory('tags');

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
