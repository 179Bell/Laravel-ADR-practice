<?php

namespace Tests\Actions;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleActionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function 一覧表示()
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200)->assertViewIs('article.index');
    }
}
