<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\ArticleService;
use App\Http\Responders\IndexArticleResponder as ArticleResponder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class DeleteArticleActions extends Controller
{
    private $articleService;

    private const SUCCESS = 1;
    private const FAIL = 0;

    /**
     * @param ArticleService $articleService
     * @param ArticleResponder $articleResponder
     */
    public function __construct(
        ArticleService $articleService,
        ArticleResponder $articleResponder
    )
    {
        $this->service = $articleService;
        $this->responder = $articleResponder;
    }

    /**
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $article_id = $request->id;
        $status = $this->service->deleteArticle($article_id);
        if ($status === self::SUCCESS) {
            return redirect()->route('article.index')->with('delete_success', '削除に成功しました');
        } elseif($status === self::FAIL) {
            return back()->with('delete_failed', '削除に失敗しました');
        }
    }
}
