<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        $articles = Article::all();
        return $articles;
    }

    /**
     * @param array $data
     * @return Article $article
     */
    public function create(array $data): Article
    {
        $articles = Article::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return $articles;
    }
}
