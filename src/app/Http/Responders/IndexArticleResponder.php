<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

final class IndexArticleResponder
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
     * @param Collection $article
     * @return Response
     */
    public function response(Collection $articles): Response
    {
        return $this->response->setContent(
            $this->view->make('article.index', ['articles' => $articles])
        );
    }
}
