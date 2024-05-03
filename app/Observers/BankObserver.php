<?php

namespace App\Observers;

use App\Models\Bank;
use App\Models\Logger;
use Log;
class BankObserver
{
    /**
     * Handle the Bank "created" event.
     */
    public function created(Bank $bank): void
    {
       
        Logger::create(['text'=>$bank->name.' adında yeni bir banka eklendi','operation'=>'Bank created.']);
        //
    }

    /**
     * Handle the Bank "updated" event.
     */
    public function updated(Bank $bank): void
    {
        Logger::create(['text'=>$bank->name.' adında banka güncellendi','operation'=>'Bank updated.']);
    }

    /**
     * Handle the Bank "deleted" event.
     */
    public function deleted(Bank $bank): void
    {
        Logger::insert(['text'=>$bank->name.' adında banka silindi','operation'=>'Bank deleted.']);
        //
    }

    /**
     * Handle the Bank "restored" event.
     */
    public function restored(Bank $bank): void
    {
        //
    }

    /**
     * Handle the Bank "force deleted" event.
     */
    public function forceDeleted(Bank $bank): void
    {
        //
    }
}
