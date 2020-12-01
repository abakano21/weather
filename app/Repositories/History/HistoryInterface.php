<?php

namespace App\Repositories\History;

use App\Models\History;

interface HistoryInterface
{
    public function getById(int $itemId);

    public function saveItem(array $itemData);

    public function editItem(History $item, array $itemData);

    public function deleteItem(History $item);

    public function getActiveItemsLatestFirst();

    public function getByDate(array $requestData);
    
    public function lastDays(array $requestData);
}
