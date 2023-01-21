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
     * 投稿を全件取得
     * @return Collection
     */
    public function getArticles()
    {
        $article = $this->articleRepository->getAll();
        return $article;
    }

    /**
     * 投稿を新規作成
     *
     * @param array $data
     * @return Article $article
     */
    public function createArticle(array $data): Article
    {
        $article = $this->articleRepository->create($data);
        return $article;
    }

    /**
     *投稿の詳細を取得
     *
     * @param string $article_id
     * @return Article
     */
    public function getArticleDetail(string $article_id): Article
    {
        $article = $this->articleRepository->getArticleDetail($article_id);
        return $article;
    }
}
