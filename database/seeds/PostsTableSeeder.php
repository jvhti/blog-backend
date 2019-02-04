<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = factory(App\Post::class, 100)->create();
        foreach ($posts as $post) {
          if(rand(0,10) > 7)
            factory(App\Report::class, rand(1, 20))->create(['reportPostID' => $post->id]);
        }
    }
}
