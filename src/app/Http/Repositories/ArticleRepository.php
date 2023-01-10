<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

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
}
