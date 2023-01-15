<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Models\Article as ArticleModel;
use Illuminate\Database\Eloquent\Collection;

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
            $this->view->make('article.index', ['articles' => $articles]));
    }
}
