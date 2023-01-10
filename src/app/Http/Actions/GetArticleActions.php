<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\ArticleService;
use App\Http\Responders\ArticleResponder;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

final class GetArticleActions extends Controller
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
     * @return Response
     */
    public function __invoke(): Response
    {
        $articles = $this->service->getArticles();
        return $this->responder->response($articles);
    }
}
