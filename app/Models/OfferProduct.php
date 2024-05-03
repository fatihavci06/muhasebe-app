<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quantity', 'price','offer_id'];
    protected $table = 'offer_product'; // Modelin bağlı olduğu veritaban


    public static function bulkInsert($data)
    {
        

        // Toplu ekleme işlemi
        if (!empty($data)) {
            self::insert($data);
        }
    }
}
