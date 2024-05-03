<?php

namespace App\Models;

use App\Observers\InvoiceTransactionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTransaction extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::observe(InvoiceTransactionObserver::class);
    }
}
