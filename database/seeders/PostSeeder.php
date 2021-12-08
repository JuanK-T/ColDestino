<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Image;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Review;
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
        $posts = Post::factory(20)->create();

        foreach($posts as $post){

            $reviews = Review::factory(2)->create([
                'post_id' => $post->id
            ]);


            foreach($reviews as $review){
                Reply::factory(1)->create([
                    'review_id' => $review->id
                ]);
            }

            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

            // Estos es para insertar datos en tabla intermedia
            $post->tags()->attach([
                rand(1,8),
                rand(9,18)
            ]);

            Section::factory(2)->create([
                'post_id' => $post->id
            ]);
        }
    }
}
