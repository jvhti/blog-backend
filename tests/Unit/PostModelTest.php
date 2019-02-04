<?php


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostHasComments()
    {
        $number = 20;

        $post = factory(App\Post::class)->create();
        $post = App\Post::find($post->id);
        $comments = factory(App\Comment::class, $number)
                      ->create(['post_id' => $post->id]);

        foreach ($comments as $c) {
          $post->comments()->save($c);
        }

        $this->assertCount($number, App\Post::find($post->id)->comments);

        foreach ($comments as $c) {
          $this->assertEquals($c->post_id, $post->id);
          $this->assertEquals($c->post->id, $post->id);
          $this->assertEquals($c->post, $post);
        }
    }

    public function testPostHasAuthor()
    {
       $post = factory(App\Post::class)->create();
       $post = App\Post::find($post->id);
       $this->assertNotNull($post->author);
       $this->assertEquals($post->author->id, $post->createdBy_user_id);

       $author = App\User::find($post->author->id);
       $this->assertNotNull($author);
       $this->assertNotNull($author->posts);

       $found = false;
       foreach ($author->posts as $p) {
         if($p->id != $post->id) continue;
         $found = true;
         break;
       }

       $this->assertTrue($found);
   }
}
