<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

final class ArticleRepository implements ArticleRepositoryInterface
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
        if (Auth::user()->can('delete', $article)) {
            $status = Article::destroy($article_id);
        } else {
            $status = self::FAIL_STATUS;
        }
        return $status;
    }

    public function updateArticle(array $data): int
    {
        $article = Article::find($data['id']);
        if (Auth::user()->can('update', $article)) {
            $status = Article::where('id', $data['id'])->update([
                'title' => $data['title'],
                'content' => $data['content']
            ]);
        } else {
            $status = self::FAIL_STATUS;
        }
        return $status;
    }
}
