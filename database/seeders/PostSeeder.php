<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Image;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(120)->create();

        foreach($posts as $post){
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

            // Estos es para insertar datos en tabla intermedia
            $post->tags()->attach([
                rand(1,8),
                rand(9,18)
            ]);

            Audience::factory(4)->create([
                'post_id' => $post->id
            ]);

            Section::factory(4)->create([
                'post_id' => $post->id
            ]);
        }
    }
}
