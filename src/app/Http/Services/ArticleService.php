<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

final class ArticleService extends Controller
{
    protected $articleRepository;

    /**
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(
        ArticleRepositoryInterface $articleRepository
    ) {
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

    public function editArticle(string $article_id): Article
    {
        $article = Article::find($article_id);
        if (Auth::user()->can('edit', $article)) {
            $article = $this->articleRepository->getArticleDetail($article_id);
            return $article;
        } else {
            abort(403);
        }
    }

    /**
     * 投稿を削除
     *
     * @param string $article_id
     * @return integer
     */
    public function deleteArticle(string $article_id): int
    {
        $status = $this->articleRepository->deleteArticle($article_id);
        return $status;
    }

    /**
     * 投稿を更新
     *
     * @param array $data
     * @return int
     */
    public function updateArticle(array $data): int
    {
        $status = $this->articleRepository->updateArticle($data);
        return $status;
    }
}
