<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ArticleRepositoryInterface
{
    /**
     * 記事を全件取得する
     *
     * @return Collection
     */
    public function getAll():  Collection;

    /**
     * 記事を作成する
     *
     * @param array $data
     * @return Article
     */
    public function create(array $data): Article;

    /**
     * 記事の詳細を取得する
     *
     * @param string $article_id
     * @return Article
     */
    public function getArticleDetail(string $article_id): Article;

    /**
     * 記事を削除する
     *
     * @param string $article_id
     * @return int  $status 1:success 0:fail
     */
    public function deleteArticle(string $article_id): int;

    /**
     * 投稿を更新する
     *
     * @param array $data
     * @return int $status 1:success 0:fail
     */
    public function updateArticle(array $data): int;
}
