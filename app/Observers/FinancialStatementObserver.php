<?php

namespace App\Observers;

use App\Models\FinancialStatement;
use App\Models\Logger;

class FinancialStatementObserver
{
    /**
     * Handle the FinancialStatement "created" event.
     */
    public function created(FinancialStatement $financialStatement): void
    {
        Logger::create(['text'=>$financialStatement->name.' adında gelir/gider kalemi eklendi','operation'=>'Financial Statement created.']);
        //
    }

    /**
     * Handle the FinancialStatement "updated" event.
     */
    public function updated(FinancialStatement $financialStatement): void
    {
        //
        Logger::create(['text'=>$financialStatement->name.' adında gelir/gider kalemi düzenlendi','operation'=>'Financial Statement updated.']);

    }

    /**
     * Handle the FinancialStatement "deleted" event.
     */
    public function deleted(FinancialStatement $financialStatement): void
    {
        //
        Logger::create(['text'=>$financialStatement->name.' adında gelir/gider kalemi silindi','operation'=>'Financial Statement deleted.']);

    }

    /**
     * Handle the FinancialStatement "restored" event.
     */
    public function restored(FinancialStatement $financialStatement): void
    {
        //
    }

    /**
     * Handle the FinancialStatement "force deleted" event.
     */
    public function forceDeleted(FinancialStatement $financialStatement): void
    {
        //
    }
}
