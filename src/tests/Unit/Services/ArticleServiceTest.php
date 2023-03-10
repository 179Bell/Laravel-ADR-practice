<?php

declare(strict_types=1);

namespace Tests\Unit\Service;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ArticleServiceTest extends TestCase
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

        $response->assertStatus(200)
            ->assertViewIs('article.index');
    }

    /**
     * @test
     */
    public function ログインユーザーは投稿ページにアクセスできる()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('article.create'))
            ->assertViewIs('article.create')->assertStatus(200);
    }

    /**
     * @test
     */
    public function ログインユーザー以外は投稿ページにアクセスできない()
    {
        $this->get(route('article.create'))->assertStatus(302);
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

        $this->actingAs($user)->articleService->createArticle($request);

        $this->assertDatabaseHas('articles', [
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);
    }

    /**
     * @test
     */
    public function 詳細ページにアクセスしてページが表示される()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $response = $this->get(route('article.detail', ['id' => $article->id]));
        $response->assertViewIs('article.detail');
    }

    /**
     * @test
     */
    public function 詳細ページにアクセスして特定の投稿が表示される()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $response = $this->get(route('article.detail', ['id' => $article->id]));
        $response->assertViewHas('article', $article);
    }

    /**
     * @test
     */
    public function 投稿ユーザーの投稿のみ削除できる()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $this->assertSame($this->actingAs($user)->articleService->deleteArticle($article->id), 1);
    }

    /**
     * @test
     */
    public function 投稿ユーザー以外は削除ができない()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => 3,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $this->assertSame($this->actingAs($user)->articleService->deleteArticle($article->id), 0);
    }

    /**
     * @test
     */
    public function ログインユーザーが編集ページにアクセスできる()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $this->actingAs($user)->get(route('article.edit', ['id' => $article->id]))->assertViewIs('article.edit')->assertStatus(200);
    }

    /**
     * @test
     */
    public function ログインユーザー以外の編集ページにアクセスできない()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => 3,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $this->actingAs($user)->get(route('article.edit', ['id' => $article->id]))->assertStatus(403);
    }

    /**
     * @test
     */
    public function 記事を更新することができる()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $status = $this->actingAs($user)->articleService->updateArticle([
            'id' => $article->id,
            'title' => 'update title',
            'content' => 'update content',
        ]);

        $this->assertSame(1, $status);
    }

    /**
     * @test
     */
    public function 記事を投稿したユーザー以外の投稿は更新できない()
    {
        $user = User::factory()->create();

        $article = $this->actingAs($user)->articleService->createArticle([
            'user_id' => 3,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $status = $this->actingAs($user)->articleService->updateArticle([
            'id' => $article->id,
            'title' => 'update title',
            'content' => 'update content',
        ]);

        $this->assertSame(0, $status);
    }
}
