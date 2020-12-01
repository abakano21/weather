<?php

namespace App\Services\Invoice;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('invoiceService', function($app) {
            return new InvoiceService(
                $app->make('App\Repositories\Invoice\InvoiceInterface')
            );
        });
    }
}
