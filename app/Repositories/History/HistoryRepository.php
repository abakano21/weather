<?php

namespace App\Repositories\History;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;

class HistoryRepository implements HistoryInterface
{
    protected $model;

    public function __construct(History $item)
    {
        $this->model = $item;
    }

    /**
     * retrieves the History by id
     *
     * @param  int $itemId
     * @return int
     */
    public function getById(int $itemId)
    {
        return $this->model->find($itemId);
    }

    /**
     * creates a new item with the given data
     *
     * @param array $itemData
     * @return Model
     */
    public function saveItem(array $itemData)
    {
        return $this->model->create($itemData);
    }

    /**
     * Edit item
     *
     * @param History $item
     * @param array $itemData
     * @return bool
     */
    public function editItem(History $item, array $itemData)
    {
        return $item->update($itemData);
    }

    /**
     * @param History $item
     * @return bool|null
     * @throws \Exception
     */
    public function deleteItem(History $item)
    {
        return $item->delete();
    }

    /**
     * Get all items
     *
     * @return mixed
     */
    public function getActiveItemsLatestFirst() {
        return $this->model
            ->orderBy('created_at', 'DESC')
            ->get()
        ;
    }

    /**
     * retrieves the History for given date
     *
     * @param array $itemData
     * @return Model
     */
    public function getByDate(array $itemData)
    {
        return $this->model->whereDate('date_at', $itemData['params']['date'])->first();
    }

    /**
     * retrieves the History for give days
     *
     * @param array $itemData
     * @return Model
     */
    public function lastDays(array $itemData)
    {
        return $this->model->limit($itemData['params']['lastDays'])->orderBy('created_at', 'desc')->get();
    }


}
