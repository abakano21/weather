<?php

namespace App\Repositories\Invoice;

use App\Models\Invoice;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class InvoiceRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Invoice\InvoiceInterface', function($app) {
            return new InvoiceRepository(new Invoice());
        });
    }
}
