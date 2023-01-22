<?php

declare(strict_types=1);

namespace App\Http\Responders;

use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;


final class EditArticleResponder
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
 * @param Article $article
 * @return Response
 */
    public function response(Article $article): Response
    {
        return $this->response->setContent($this->view->make('article.edit',  ['article' => $article]));
    }
}
