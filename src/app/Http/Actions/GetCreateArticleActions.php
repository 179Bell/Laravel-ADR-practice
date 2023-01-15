<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Responders\CreateArticleResponder as ArticleResponder;
use Illuminate\Http\Response;
use App\Http\Services\ArticleService;
use App\Http\Requests\ArticleRequest as Request;

final class GetCreateArticleActions extends Controller
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
     * @return Response
     */
    public function __invoke(): Response
    {
        return $this->articleResponder->response();
    }
}
