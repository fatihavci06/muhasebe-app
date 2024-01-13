<?php

namespace App\Models;

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

}
