<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Responders\DetailArticleResponder as ArticleResponder;
use App\Http\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class GetDetailArticleActions extends Controller
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
    ) {
        $this->service = $articleService;
        $this->responder = $articleResponder;
    }

    /**
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $article_id = $request->id;
        $article = $this->service->getArticleDetail($article_id);
        return $this->responder->response($article);
    }
}
