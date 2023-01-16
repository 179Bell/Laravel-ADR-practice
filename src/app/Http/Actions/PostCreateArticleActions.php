<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Responders\AfterCreateArticleResponder as ArticleResponder;
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
        ArticleResponder $articleResponder
    )
    {
        $this->articleService = $articleService;
        $this->articleResponder = $articleResponder;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $article = $this->articleService->createArticle($request);
        return redirect()->route('article.index', [$article]);
    }
}
