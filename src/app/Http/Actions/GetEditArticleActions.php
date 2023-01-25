<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\ArticleService;
use App\Http\Responders\EditArticleResponder as ArticleResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class GetEditArticleActions extends Controller
{
    private $articleResponder;
    private $articleService;

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
     * @param  Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $article_id = $request->id;
        $articles = $this->service->editArticle($article_id);
        return $this->responder->response($articles);
    }
}
