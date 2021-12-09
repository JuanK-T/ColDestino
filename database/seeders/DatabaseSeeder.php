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

        Storage::deleteDirectory('public/posts');
        Storage::deleteDirectory('public/tags');

        Storage::makeDirectory('public/posts');
        Storage::makeDirectory('public/tags');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
    }
}
