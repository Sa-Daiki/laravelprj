<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    // 記事のタイトルが表示されるかのテスト
    public function testIndexTitleDisplay()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->get('/articles');
        $response->assertSeeText($article->title);
        $response->assertStatus(200);
    }

    // タイトル、内容、タグが保存されるかどうかのテスト
    public function testStore()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();
        $response = $this->actingAs($user)->postJson('/articles', [
            'tags_id' => $tag->id,
            'title' => 'タイトル',
            'content' => '内容',
        ]);
        $response->assertStatus(302);
    }

    // public function testStoreTitleIsNull()
    // {
    //     $user = User::factory()->create();
    //     $tag = Tag::factory()->create();
    //     $response = $this->actingAs($user)
    //                               ->postJson('/articles', [
    //         'tags_id'=>$tag->id,
    //         'title'=>null,
    //         'content'=>'内容',
    //     ]);
    //     $response->assertStatus(500);
    // }

    public function testCreate()
    {
        $response = $this->get('/articles/create');
        $response->assertStatus(200);
    }

    // 記事の詳細ページにアクセスできるかどうかのテスト
    public function testShow()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id
        ]);
        $response = $this->get("/articles/$article->id");
        $response->assertStatus(200);
    }
    // 記事の更新できるかどうかのテスト
    public function testUpdate()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)
            ->putJson("/articles/$article->id", [
                'title' => 'タイトル',
                'content' => '内容',
            ]);
        $this->assertDatabaseHas('articles', [
            'title' => 'タイトル',
            'content' => '内容',
        ]);
        $response->assertStatus(302);
    }
    // 記事を削除できるかどうかのテスト
    public function testDestroy()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseMissing('articles', [
            'title' => $article->title,
            'content' => $article->content,
            'user_id' => $article->id,
            'status' => $article->status,
            'updated_at' => $article->updated_at,
            'created_at' => $article->created_at,
            'user_id' => $article->user_id
        ]);
        $response = $this->actingAs($user)->delete("/articles/$article->id");
        $response->assertStatus(302);
    }

    // 記事を編集できるかどうかのテスト
    public function testEdit()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get("/articles/$article->id/edit");
        $response->assertStatus(200);
    }
}
