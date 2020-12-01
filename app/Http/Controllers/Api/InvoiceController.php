<?php

namespace App\Http\Controllers\Api;

use App\Models\Invoice;
use App\Services\Invoice\InvoiceFacade;
use App\Transformers\InvoiceTransformer;

class InvoiceController extends BaseController
{
    /**
     * Get all active invoices
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\TransformerException
     */
    public function getAll() {
        $items = InvoiceFacade::getActiveItemsLatestFirst();
        if($items->count())
            return $this->success(InvoiceTransformer::transform($items));

        return $this->error('INVOICE_ERRORS', 'NO_INVOICES');
    }
    /**
     * Get Single Invoice
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\TransformerException
     */
    public function getInvoice(Invoice $invoice) {
        return $this->success(InvoiceTransformer::transformSingleInvoiceFull($invoice));
    }

    public function store()
    {
        $item = InvoiceFacade::save(request()->all());
        if(!$item) 
            return $this->error('INVOICE_ERRORS', 'CANNOT_BE_STORED');

        return $this->success(InvoiceTransformer::transformSingleInvoiceFull($item));
    }

    public function destroy(Invoice $invoice)
    {
        $item = InvoiceFacade::delete($invoice);
        if(!$item) 
            return $this->error('INVOICE_ERRORS', 'NO_INVOICE');

        return $this->success(['data'=> ['deleted'=>1]]);
    }

    public function updatePaidStatus(Invoice $invoice)
    {
        $item = InvoiceFacade::updatePaidStatus($invoice);
        if(!$item) 
            return $this->error('INVOICE_ERRORS', 'NO_INVOICE');

        return $this->success(InvoiceTransformer::transformSingleInvoiceFull($invoice));
    }

}
