<?php

namespace Tests\Unit\Repository;

use App\Http\Repositories\ArticleRepository;
use App\Models\User;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->articleRepository = new ArticleRepository();
    }

    /**
     * @test
     */
    public function 記事を全件取得したときの件数が正しいか()
    {
        $this->seed();

        $result = $this->articleRepository->getAll();

        $this->assertSame(10, $result->count());
    }

    /**
     * @test
     */
    public function 記事の投稿に成功する()
    {
        $user = User::factory()->create();

        $data = [
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ];

        $result = $this->articleRepository->create($data);

        $this->assertDatabaseHas('articles', [
            'user_id' => $result->user_id,
            'title' => $result->title,
            'content' => $result->content
        ]);
    }

    /**
     * @test
     */
    public function 特定の記事のみ取得できる()
    {
        $user = User::factory()->create();

        $article = $this->articleRepository->create([
            'user_id' => $user->id,
            'title' => 'test title',
            'content' => 'test content',
        ]);

        $result = $this->articleRepository->getArticleDetail($article->id);
        $this->assertSame($article->id, $result->id);
        $this->assertSame($article->title, $result->title);
        $this->assertSame($article->content, $result->content);
    }
}
