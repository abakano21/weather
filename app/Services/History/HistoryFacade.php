<?php

namespace App\Services\History;
use \Illuminate\Support\Facades\Facade;

class HistoryFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘historyService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'historyService'; }

}
