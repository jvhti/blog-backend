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
          if(rand(0,10) > 7){
            factory(App\Report::class, rand(1, 20))->create(['reportedPost_id' => $post->id]);
            factory(App\Report::class, rand(1, 5))->states(['reviewed'])->create(['reportedPost_id' => $post->id]);
          }
          if(rand(0,10) < 7)
            $this->call(CommentsTableSeeder::class, ['post_id' => $post->id, 'max' => rand(1, 50)]);

          $tagCount = App\Tag::count();
          $postTags = rand(2,20);

          for($i = 0; $i < $postTags; ++$i)
            $post->tags()->save(App\Tag::find(rand(1, $tagCount)));
        }
    }

    public function call($class, $extra = null)
    {
        $this->resolve($class)->run($extra);

        if (isset($this->command)) {
            $this->command->getOutput()->writeln("    <info>Seeded Comments for Post: </info>".$extra['post_id']);
        }
    }
}
