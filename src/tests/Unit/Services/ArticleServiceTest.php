<?php

namespace Tests\Unit\Service;

use App\Http\Repositories\ArticleRepository;
use App\Http\Services\ArticleService;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $articleService;

    public function setUp(): void
    {
        parent::setUp();

        $this->articleService = $this->app->make('\App\Http\Services\ArticleService');
    }

    /**
     * @test
     */
    public function 記事を全件取得()
    {
        $this->seed();

        $response = $this->get('/');

        // ステータスコードとどの画面が表示されているかの検証
        $response->assertStatus(200)
            ->assertViewIs('article.index');
    }

    /**
     * @test
     */
    public function 記事を投稿してDBに値が存在する()
    {
        $user = User::factory()->create();

        $request = [
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ];

        $result = $this->actingAs($user)->articleService->createArticle($request);

        $this->assertDatabaseHas('articles', [
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);
    }
}


