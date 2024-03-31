<?php

namespace App\Services;

use App\Repositories\PaymentRepositoryInterface;
use App\Repositories\ReportRepositoryInterface;
use Illuminate\Http\Request;

class ReportService
{
    protected $reportRepository;
    public function __construct(ReportRepositoryInterface $reportRepository) {
        $this->reportRepository = $reportRepository;
    }

    public function getAllReport() {
        $data['income']=$this->reportRepository->getPaymentWithTypeCount($type=0);
        $data['expense']=$this->reportRepository->getPaymentWithTypeCount($type=1);
        $data['incomeSum']=$this->reportRepository->getPaymentWithTypeSum($type=0);
        $data['expenseSum']=$this->reportRepository->getPaymentWithTypeSum($type=1);
        return $data;
    }



}
