<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'customer_id',
        'bank_id',
        'date',
        'description',
        'invoice_id',
        'price'
    ];
    public function customers()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function invoices()
    {
        return $this->hasOne(Invoice::class,'id','invoice_id');
    }
    public function banks()
    {
        return $this->hasOne(Bank::class,'id','bank_id');
    }
}
