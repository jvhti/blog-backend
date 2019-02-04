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
        $comments = factory(App\Comment::class, rand(1, $extra['max']))->create(['postID' => $extra['postID']]);
        foreach ($comments as $comment) {
          if(rand(0,10) > 7)
            factory(App\Report::class, rand(1, 3))->create(['reportCommentID' => $comment->id]);
        }
    }
}
