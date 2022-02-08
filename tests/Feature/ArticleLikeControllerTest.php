<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\ArticleLike;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleLikeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * いいね押したときに送信してデータベースに保存されるか
     * いいねを消したときにデータベースから削除されるかー
     *
     * @return void
     */
    public function testStore()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user1->id,
        ]);
        $response = $this->actingAs($user2)->postJson('/article_likes', [
            'article_id'=> $article->id,
        ]);
        $this->assertDatabaseHas('article_likes', [
            'article_id'=> $article->id,
        ]);
        $response = $this->actingAs($user2)->postJson('/article_likes', [
            'article_id'=> $article->id,
            'user_id' => $user1->id,
        ]);
        $this->assertDatabaseMissing('article_likes', [
            'article_id'=> $article->id,
            'user_id' => $user1->id,
        ]);
        $response->assertStatus(302);
    }
}
