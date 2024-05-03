<?php

namespace App\Models;

use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['customer_type', 'name', 'surname', 'email', 'photo', 'birthday', 'tc_no', 'adress', 'number', 'company_name', 'tax_number', 'tax_office'];
    protected static function boot()
    {
        parent::boot();

        static::observe(CustomerObserver::class);
    }
}
