<?php

namespace App\Repositories\Invoice;

use App\Models\Invoice;

interface InvoiceInterface
{
    public function getById(int $itemId);

    public function saveItem(array $itemData);

    public function editItem(Invoice $item, array $itemData);

    public function deleteItem(Invoice $item);

    public function getActiveItemsLatestFirst();

    public function updatePaidStatus(Invoice $invoice);
}
