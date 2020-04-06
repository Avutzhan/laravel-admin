<?php

namespace App\UseCases;

use App\Repositories\IArticleRepository;
use StarterKit\Core\UseCases\BaseCase;

class ArticleCase extends BaseCase
{
    public function __construct(IArticleRepository $articleRepository)
    {
        $this->repository = $articleRepository;
    }

    public function getListForApi()
    {
        return $this->repository->filterForApi();
    }
}
