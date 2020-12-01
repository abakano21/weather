<?php

namespace App\Services\Invoice;
use \Illuminate\Support\Facades\Facade;

class InvoiceFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘invoiceService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'invoiceService'; }

}
