<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Models\Article as ArticleModel;

final class ArticleResponder
{
    protected $response;
    protected $view;

    /**
     * @param Response $response
     * @param ViewFactory $view
     */
    public function __construct(Response $response, ViewFactory $view)
    {
        $this->response = $response;
        $this->view = $view;
    }

    /**
     * @param ArticleModel $article
     * @return Response
     */
    public function response(ArticleModel $articles): Response
    {
        return $this->response->setContent($this->view->make('article.index', $articles));
    }
}
