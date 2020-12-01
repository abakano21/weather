<?php

namespace App\Services\History;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('historyService', function($app) {
            return new HistoryService(
                $app->make('App\Repositories\History\HistoryInterface')
            );
        });
    }
}
