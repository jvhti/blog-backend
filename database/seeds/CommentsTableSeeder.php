<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($extra = [])
    {
        $comments = factory(App\Comment::class, rand(1, $extra['max']))->create(['post_id' => $extra['post_id']]);

        foreach ($comments as $comment) {
          if(rand(0,10) <= 7) continue;
          factory(App\Report::class, rand(1, 3))->create(['reportedComment_id' => $comment->id]);
          factory(App\Report::class, rand(1, 2))->states(['reviewed'])->create(['reportedComment_id' => $comment->id]);
        }
    }
}
