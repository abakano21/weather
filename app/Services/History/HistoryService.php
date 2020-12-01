<?php

namespace App\Services\History;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\History\HistoryInterface;

class HistoryService
{
    protected $historyRepo;

    public function __construct(HistoryInterface $historyRepo)
    {
        $this->historyRepo = $historyRepo;
    }

    /**
     * retrieves the item by id
     *
     * @param  int $itemId
     * @return History
     */
    public function get($itemId)
    {
        return $this->historyRepo->getById($itemId);
    }

    /**
     * creates a item with the given data
     *
     * @param array $data
     * @return Model
     */
    public function save(array $data)
    {
        return $this->historyRepo->saveItem($data);
    }

    /**
     * Update item
     *
     * @param History $item
     * @param array $data
     * @return Model
     */
    public function edit(History $item, array $data)
    {
        return $this->historyRepo->editItem($item, $data);
    }

    /**
     * Remove the History
     *
     * @param History $item
     * @return mixed
     */
    public function delete(History $item)
    {
        return $this->historyRepo->deleteItem($item);
    }

    /**
     * Get all active items
     *
     * @return mixed
     */
    public function getActiveItemsLatestFirst() {
        return $this->historyRepo->getActiveItemsLatestFirst();
    }

    /**
     * Get item by date
     *
     * @return mixed
     */
    public function getByDate(array $requestData) {
        return $this->historyRepo->getByDate($requestData);
    }

    /**
     * Get items for given days
     *
     * @return mixed
     */
    public function lastDays(array $requestData) {
        return $this->historyRepo->lastDays($requestData);
    }

}
