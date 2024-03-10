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
}
