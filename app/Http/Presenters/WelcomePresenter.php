<?php

namespace App\Http\Presenters;

use Illuminate\Support\Collection;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;

class WelcomePresenter extends Presenter
{
    /**
     * Returns a new table of all of the given articles.
     *
     * @param Collection $articles
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function table(Collection $articles)
    {
        return $this->table->of('technology.feed', function (TableGrid $table) use ($articles) {
            $table->rows($articles->toArray());

            $table->attributes(['class' => 'table-hover']);

            $table->column('title')
                ->value(function ($article) {
                    return $article->title;
                });

            $table->column('description')
                ->value(function ($article) {
                    return str_limit($article->description);
                });
        });
    }
}
