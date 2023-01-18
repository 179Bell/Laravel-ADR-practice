<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\ArticleRequest as Request;

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
     * @param array $data
     * @return Article $article
     */
    public function createArticle(array $data): Article
    {
        $article = $this->articleRepository->create($data);
        return $article;
    }
}
