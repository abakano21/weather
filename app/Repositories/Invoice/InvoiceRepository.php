<?php

namespace App\Repositories\Invoice;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class InvoiceRepository implements InvoiceInterface
{
    protected $model;

    public function __construct(Invoice $item)
    {
        $this->model = $item;
    }

    /**
     * retrieves the Invoice by id
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
     * @param Invoice $item
     * @param array $itemData
     * @return bool
     */
    public function editItem(Invoice $item, array $itemData)
    {
        return $item->update($itemData);
    }

    /**
     * @param Invoice $item
     * @return bool|null
     * @throws \Exception
     */
    public function deleteItem(Invoice $item)
    {
        return $item->delete();
    }

    /**
     * Get all active items
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
     * Change the active status
     *
     * @param Invoice $item
     * @return bool
     */
    public function updatePaidStatus(Invoice $item)
    {
        return $item->update(['is_paid' => !$item->is_paid]);
    }

}
