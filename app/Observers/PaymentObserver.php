<?php

namespace App\Observers;

use App\Models\Logger;
use App\Models\Payment;

class PaymentObserver
{
    /**
     * Handle the Payment "created" event.
     */
    public function created(Payment $payment): void
    {
        //
        Logger::create(['text'=>$payment->price.' tutarında ödeme/tahsilat yapıldı','operation'=>'Payment created.']);

    }

    /**
     * Handle the Payment "updated" event.
     */
    public function updated(Payment $payment): void
    {
        Logger::create(['text'=>$payment->price.' tutarında ödeme/tahsilat düzenlendi','operation'=>'Payment updated.']);
        //
    }

    /**
     * Handle the Payment "deleted" event.
     */
    public function deleted(Payment $payment): void
    {
        //
        Logger::create(['text'=>$payment->price.' tutarında ödeme/tahsilat silindi','operation'=>'Payment deleted.']);
    }

    /**
     * Handle the Payment "restored" event.
     */
    public function restored(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     */
    public function forceDeleted(Payment $payment): void
    {
        //
    }
}
