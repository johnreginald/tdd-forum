<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authenticated_user_may_participate_in_forum_threads()
    {
        // Given we have an authenticated user
        $this->be($user = create('App\User'));

        // and existing thread
        $thread = create('App\Thread');

        // When then user add reply to the thread
        $reply = create('App\Reply');
        $this->post($thread->path() . '/replies', $reply->toArray() );

        // then their reply should be visible on the page
        $this->get($thread->path())->assertSee($reply->body);
    }

    public function test_unauthenticated_users_may_not_add_replies()
    {
        $this->withoutExceptionHandling()
            ->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads/channel/1/replies', [])
            ->assertRedirect('/login');
    }

    public function test_a_reply_requires_a_body()
    {
        $this->signIn();

        $thread = create('App\Thread');
        $reply = make('App\Reply', ['body' => null]);

        $this->post($thread->path() . '/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
