<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface ReportRepositoryInterface {
    public function getPaymentWithTypeCount($type);
    public function getPaymentWithTypeSum($type);

}

