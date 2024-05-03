<?php

namespace App\Observers;

use App\Models\InvoiceTransaction;

class InvoiceTransactionObserver
{
    /**
     * Handle the InvoiceTransaction "created" event.
     */
    public function created(InvoiceTransaction $invoiceTransaction): void
    {
        //
    }

    /**
     * Handle the InvoiceTransaction "updated" event.
     */
    public function updated(InvoiceTransaction $invoiceTransaction): void
    {
        //
    }

    /**
     * Handle the InvoiceTransaction "deleted" event.
     */
    public function deleted(InvoiceTransaction $invoiceTransaction): void
    {
        //
    }

    /**
     * Handle the InvoiceTransaction "restored" event.
     */
    public function restored(InvoiceTransaction $invoiceTransaction): void
    {
        //
    }

    /**
     * Handle the InvoiceTransaction "force deleted" event.
     */
    public function forceDeleted(InvoiceTransaction $invoiceTransaction): void
    {
        //
    }
}
