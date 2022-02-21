<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $article = Article::factory()->create([
            'user_id'=>$user1->id,
        ]);
        $response = $this->actingAs($user2)->postJson('/comments', [
            'comment'=>'テストコメント',
            'article_id'=>$article->id,
            'user_id'=>$user1->id
        ]);
        $response->assertStatus(302);
    }

    public function testUpdate()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user1->id,
        ]);
        $response = $this->actingAs($user2)
                                  ->putJson("/articles/$article->id", [
            'title'=>'タイトル',
            'content'=>'内容',
        ]);
        $response->assertStatus(302);
    }
}

