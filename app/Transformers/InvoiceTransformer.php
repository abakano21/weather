<?php

namespace App\Transformers;

use League\Fractal;
use App\Models\Invoice;
use App\Exceptions\TransformerException;

class InvoiceTransformer extends Fractal\TransformerAbstract
{
    public static function transformSingleInvoiceFull(Invoice $invoice)
    {
        try {
        
            return [
                'id'                        => (int)    $invoice->id,
                'school_name'               => (string) $invoice->school_name,
                'description'               => (string) $invoice->description,
                'amount'                    => (int)    $invoice->amount,
                'is_paid'                   => (int)    $invoice->is_paid,         
                'link'                      => (string) $invoice->link,       
                'created_at'                => (int)    $invoice->created_at->timestamp,       
                'username'                  => (string) $invoice->user->name,
            ];
        }
        catch (\Exception $exception) {
            throw new TransformerException('SINGLE_INVOICE');
        }
    }

    public static function transform($items)
    {
        try {
            return $items->map(function($item) {
                return self::transformSingleInvoiceFull($item);
            });
        }
        catch (\Exception $exception) {
            throw new TransformerException('INVOICES');
        }
    }

}
