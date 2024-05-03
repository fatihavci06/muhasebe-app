<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['userid', 'status'];
    public function products()
    {
        return $this->hasMany(OfferProduct::class,'offer_id','id');
    }
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
