<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\Logger;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        Logger::insert(['text'=>$customer->name.' '.$customer->surname.' adında yeni bir müşteri eklendi','operation'=>'Customer created.']);

        //
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        Logger::insert(['text'=>$customer->name.' '.$customer->surname.' adında müşteri düzenlendi','operation'=>'Customer updated.']);
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        Logger::insert(['text'=>$customer->name.' '.$customer->surname.' adında müşteri silindi','operation'=>'Customer deleted.']);
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
