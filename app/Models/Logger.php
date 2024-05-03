<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'text',
        'operation'
    ];
    public function getCreatedAtAttribute($value)
    {
        // Gelen değeri Carbon ile parse et ve istenen formata dönüştür
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function getUpdatedAtAttribute($value)
    {
        // Gelen değeri Carbon ile parse et ve istenen formata dönüştür
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
