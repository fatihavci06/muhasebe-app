<?php

namespace App\Models;

use App\Observers\FinancialStatementObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialStatement extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'name', 'kdv'];
    public static function getFinancial()
    {
      return FinancialStatement::where('type',0)->get();  
    }
    protected static function boot()
    {
        parent::boot();

        static::observe(FinancialStatementObserver::class);
    }

}
