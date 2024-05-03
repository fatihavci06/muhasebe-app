<?php

namespace App\Services;

use App\Repositories\PaymentRepositoryInterface;
use App\Repositories\ReportRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportService
{
    protected $reportRepository;
    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getAllReport()
    {
        $data['income'] = $this->reportRepository->getPaymentWithTypeCount($type = 0);
        $data['expense'] = $this->reportRepository->getPaymentWithTypeCount($type = 1);
        $data['incomeSum'] = $this->reportRepository->getPaymentWithTypeSum($type = 0);
        $data['expenseSum'] = $this->reportRepository->getPaymentWithTypeSum($type = 1);
        return $data;
    }
    public function getIncomeReport()
    {
       return $results = DB::table(DB::raw('(SELECT DATE_SUB(CURDATE(), INTERVAL (t0.i + t1.i * 10 + t2.i * 100) DAY) AS date FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6) AS t0, (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6) AS t1, (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6) AS t2 ) AS d'))
            ->leftJoin('payments as p', function ($join) {
                $join->on('d.date', '=', 'p.date')
                    ->where('p.type', '=', 0);
            })
            ->select(DB::raw('IFNULL(SUM(p.price), 0) AS total_price'), 'd.date')
            ->where('d.date', '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL 7 DAY)'))
            ->groupBy('d.date')
            ->orderBy('d.date')
            ->get();
    }
    public function getExpenseReport()
    {
       return $results = DB::table(DB::raw('(SELECT DATE_SUB(CURDATE(), INTERVAL (t0.i + t1.i * 10 + t2.i * 100) DAY) AS date FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6) AS t0, (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6) AS t1, (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6) AS t2 ) AS d'))
            ->leftJoin('payments as p', function ($join) {
                $join->on('d.date', '=', 'p.date')
                    ->where('p.type', '=', 1);
            })
            ->select(DB::raw('IFNULL(SUM(p.price), 0) AS total_price'), 'd.date')
            ->where('d.date', '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL 7 DAY)'))
            ->groupBy('d.date')
            ->orderBy('d.date')
            ->get();
    }
    public function getAllLog()
    {
        return  $this->reportRepository->getAllLog();
    }
}
