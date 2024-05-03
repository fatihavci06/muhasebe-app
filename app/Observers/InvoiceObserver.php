<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Logger;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
        Logger::create(['text'=>$invoice->invoice_no.' numaralı fatura eklendi','operation'=>'Invoice added.']);

        //
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        Logger::create(['text'=>$invoice->id.' numaralı fatura düzenlendi','operation'=>'Invoice updated.']);
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        Logger::create(['text'=>$invoice->invoice_no.' numaralı fatura silindi','operation'=>'Invoice deleted.']);
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }
}
