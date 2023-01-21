<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest as Request;
use App\Http\Services\ArticleService;
use Illuminate\Http\RedirectResponse;

final class PostCreateArticleActions extends Controller
{
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
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content
        ];

        $article = $this->articleService->createArticle($data);
        return redirect()->route('article.index', [$article]);
    }
}
