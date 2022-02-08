<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ArticleEditControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example
     *
     * @return void
     */
    public function testIndex()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->actingAs($user)->get('/article_edits');
        $response->assertStatus(200);
    }
}
