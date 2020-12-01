<?php

namespace App\Transformers;

use League\Fractal;
use App\Models\History;
use App\Exceptions\TransformerException;

class HistoryTransformer extends Fractal\TransformerAbstract
{
    public static function transformSingleHistoryFull(History $history)
    {
        try {
        
            return [
                'id'                        => (int)    $history->id,
                'temp'                      => (string) $history->temp,
                'date_at'                   => (string) $history->date_at,
                'created_at'                => (int)    $history->created_at->timestamp,       
            ];
        }
        catch (\Exception $exception) {
            throw new TransformerException('SINGLE_HISTORY');
        }
    }

    public static function transform($items)
    {
        try {
            return $items->map(function($item) {
                return self::transformSingleHistoryFull($item);
            });
        }
        catch (\Exception $exception) {
            throw new TransformerException('HISTORIES');
        }
    }

}
