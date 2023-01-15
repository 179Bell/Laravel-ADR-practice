<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;

final class CreateArticleResponder
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
     * @return Response
     */
    public function response(): Response
    {
        return $this->response->setContent($this->view->make('article.create'));
    }
}
