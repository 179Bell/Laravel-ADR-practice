<?php

namespace Tests\Unit\Service;

use App\Http\Services\ArticleService;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
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
}


