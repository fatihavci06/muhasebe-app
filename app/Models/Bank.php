<?php

namespace App\Models;

use App\Observers\BankObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'iban',
        'account_number'
    ];

    protected static function boot()
    {
        parent::boot();

        static::observe(BankObserver::class);
    }
}
