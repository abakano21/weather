<?php

namespace App\Repositories\History;

use App\Models\History;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class HistoryRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\History\HistoryInterface', function($app) {
            return new HistoryRepository(new History());
        });
    }
}
