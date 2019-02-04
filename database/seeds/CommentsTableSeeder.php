<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = factory(App\Comment::class, 50)->create();
        foreach ($comments as $comment) {
          if(rand(0,10) > 7)
            factory(App\Report::class, rand(1, 3))->create(['reportCommentID' => $comment->id]);
        }
    }
}
