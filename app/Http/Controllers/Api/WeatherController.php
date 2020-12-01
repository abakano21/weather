<?php

namespace App\Http\Controllers\Api;

use App\Models\History;
use App\Services\History\HistoryFacade;
use App\Transformers\HistoryTransformer;

class WeatherController extends BaseController
{
    /**
     * Get all active histories
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\TransformerException
     */
    public function getAll() {
        $items = HistoryFacade::getActiveItemsLatestFirst();
        if($items->count())
            return $this->success(HistoryTransformer::transform($items));

        return $this->error('HISTORY_ERRORS', 'NO_HISTORIES');
    }

    /**
     * Get Single History
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\TransformerException
     */
    public function getByDate() {
        
        $history = HistoryFacade::getByDate(request()->all());
        
        if(!$history) {
            return $this->error('HISTORY_ERRORS', 'NO_HISTORY');
        }
        return $this->success(HistoryTransformer::transformSingleHistoryFull($history));
    }

    /**
     * Get Last Days
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\TransformerException
     */
    public function lastDays() {
        
        $histories = HistoryFacade::lastDays(request()->all());
        
        if(!$histories) {
            return $this->error('HISTORY_ERRORS', 'NO_HISTORY');
        }

        return $this->success(HistoryTransformer::transform($histories));
    }

}
