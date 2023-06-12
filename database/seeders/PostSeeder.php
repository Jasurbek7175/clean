<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Database\Factories\PostFactory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => 1,

            'title' => 'sarlavha',
            'short_content' => 'qisqa mazmuni',
            'part' => 'toliq mazmoni',
            'photo' => null
        ]);
//        Post::create([
//            'user_id' => 1,
//            'title' => 'sarlavha',
//            'short_content' => 'qisqa mazmuni',
//            'part' => 'toliq mazmoni',
//            'photo' => null
//        ]);
//    Post::factory()->count(20)->create();

    }
}
