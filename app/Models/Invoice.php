<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function transactions()
    {
        return $this->hasMany(InvoiceTransaction::class,'invvoice_id','id');
    }
}
