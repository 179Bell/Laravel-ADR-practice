<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest as Request;
use App\Http\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class UpdateArticleActions extends Controller
{
    private const SUCCESS = 1;
    private const FAIL = 0;

    /**
     * @param ArticleService $articleService
     * @param ArticleResponder $articleResponder
     */
    public function __construct(
        ArticleService $articleService,
    )
    {
        $this->articleService = $articleService;
    }

    /**
     * @param array $data
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $data = [
            'id' => (int)$request->id,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content
        ];

        $status = $this->articleService->updateArticle($data);
        if ($status === self::SUCCESS) {
            return redirect()->route('article.index')->with('update_success', '更新に成功しました');
        } elseif($status === self::FAIL) {
            return back()->with('update_failed', '更新に失敗しました');
        }
    }
}
