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
     * @param Request $request
     * @return Article $article
     */
    public function create(Request $request): Article
    {
        $articles = Article::create([
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'content' => $request['content']
        ]);

        return $articles;
    }
}
