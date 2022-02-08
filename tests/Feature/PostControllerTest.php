<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->get('/posts');
        $response->assertSeeText($article->title);
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();
        $response = $this->actingAs($user)->postJson('/posts', [
            'tags_id'=>$tag->id,
            'title'=>'タイトル',
            'content'=>'内容',
        ]);
        $response->assertStatus(302);
    }

    // public function testStoreTitleIsNull()
    // {
    //     $user = User::factory()->create();
    //     $tag = Tag::factory()->create();
    //     $response = $this->actingAs($user)
    //                               ->postJson('/posts', [
    //         'tags_id'=>$tag->id,
    //         'title'=>null,
    //         'content'=>'内容',
    //     ]);
    //     $response->assertStatus(500);
    // }

    public function testCreate()
    {
        $response = $this->get('/posts/create');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->get("/posts/$article->id");
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->actingAs($user)
                                  ->putJson("/posts/$article->id", [
            'title'=>'タイトル',
            'content'=>'内容',
        ]);
        $this->assertDatabaseHas('articles', [
            'title' => 'タイトル',
            'content' => '内容',
        ]);
        $response->assertStatus(302);
    }

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
        ]);
        $response = $this->actingAs($user)->delete("/posts/$article->id");
        $response->assertStatus(302);
    }

    public function testEdit()
    {
        $user= User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->actingAs($user)->get("/posts/$article->id/edit");
        $response->assertStatus(200);
    }

}
