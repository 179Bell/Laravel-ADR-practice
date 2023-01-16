<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class ArticleService extends Controller
{
    protected $articleRepository;

    /**
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(
        ArticleRepositoryInterface $articleRepository
    )
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return Collection
     */
    public function getArticles()
    {
        $article = $this->articleRepository->getAll();
        return $article;
    }

    /**
     * @param Request $request
     * @return Article $article
     */
    public function createArticle(Request $request): Article
    {
        $article = $this->articleRepository->create($request);
        return $article;
    }
}
