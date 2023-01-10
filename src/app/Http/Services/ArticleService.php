<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ArticleRepositoryInterface;

final class ArticleService extends Controller
{
    protected $articleRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository
    )
    {
        $this->articleRepository = $articleRepository;
    }
    public function getArticles()
    {
        $article = $this->articleRepository->getAll();
        return $article;
    }
}
