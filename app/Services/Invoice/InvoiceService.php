<?php

namespace App\Services\Invoice;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Invoice\InvoiceInterface;

class InvoiceService
{
    protected $invoiceRepo;

    public function __construct(InvoiceInterface $invoiceRepo)
    {
        $this->invoiceRepo = $invoiceRepo;
    }

    /**
     * retrieves the item by id
     *
     * @param  int $itemId
     * @return Invoice
     */
    public function get($itemId)
    {
        return $this->invoiceRepo->getById($itemId);
    }

    /**
     * creates a item with the given data
     *
     * @param array $data
     * @return Model
     */
    public function save(array $data)
    {
        return $this->invoiceRepo->saveItem($data);
    }

    /**
     * Update item
     *
     * @param Invoice $item
     * @param array $data
     * @return Model
     */
    public function edit(Invoice $item, array $data)
    {
        return $this->invoiceRepo->editItem($item, $data);
    }

    /**
     * Remove the Invoice
     *
     * @param Invoice $item
     * @return mixed
     */
    public function delete(Invoice $item)
    {
        return $this->invoiceRepo->deleteItem($item);
    }

    /**
     * Get all active items
     *
     * @return mixed
     */
    public function getActiveItemsLatestFirst() {
        return $this->invoiceRepo->getActiveItemsLatestFirst();
    }

    /**
     * Change the active status
     *
     * @param Invoice $item
     * @return bool
     */
    public function updatePaidStatus(Invoice $item)
    {
        return $this->invoiceRepo->updatePaidStatus($item);
    }
}
