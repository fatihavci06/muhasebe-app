<?php
namespace App\Repositories;

use App\Models\Payment;
use App\Models\Report;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class ReportRepository implements ReportRepositoryInterface {

    public function getPaymentWithTypeCount($type) {
       return  Payment::where('type',$type)->count();
    }
    public function getPaymentWithTypeSum($type) {
        return  Payment::where('type',$type)->sum('price');
     }


}
