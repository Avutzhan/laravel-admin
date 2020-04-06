<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use StarterKit\Core\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository implements IArticleRepository
{
    protected $model = Article::class;

    public function filterForApi(): LengthAwarePaginator
    {
        $filteredModel = $this->filterModel();

        return $filteredModel->paginate(10);
    }

    private function filterModel()
    {
        $article = $this->getModel();

        if (count($this->orderParams))
        {

            foreach ($this->orderParams as $order)
            {
                $article = $article->orderBy($order['field'], $order['condition']);
            }
        }

        if (count($this->whereParams))
        {

            foreach ($this->whereParams as $where)
            {
                $article = $article->where($where['field'], $where['operator'], $where['value']);
            }
        }

        if (count($this->whereHasParams))
        {
            foreach ($this->whereHasParams as $whereHas)
            {
                $article = $article->whereHas($whereHas['field'], $whereHas['value']);
            }
        }

        if (count($this->whereBetweenParams))
        {
            foreach ($this->whereBetweenParams as $params)
            {
                $article = $article->whereBetween($params['field'], [$params['value1'], $params['value2']]);
            }
        }

        if (count($this->relations))
        {
            $article = $article->with($this->relations);
        }

        if (count($this->relationsCount))
        {
            $article = $article->withCount($this->relationsCount);
        }

        return $article;
    }
}
