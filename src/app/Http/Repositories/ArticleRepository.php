<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleRepository implements ArticleRepositoryInterface
{
    private const FAIL_STATUS = 0;

    public function getAll(): Collection
    {
        $articles = Article::all();
        return $articles;
    }

    public function create(array $data): Article
    {
        $articles = Article::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return $articles;
    }

    public function getArticleDetail(string $article_id): Article
    {
        $article = Article::find($article_id);
        return $article;
    }

    public function deleteArticle(string $article_id): int
    {
        $article = Article::find($article_id);
        if (Auth::user()->can('deleteArticle', $article)) {
            $status = Article::destroy($article_id);
        } else {
            $status = self::FAIL_STATUS;
        }
        return $status;
    }
}
