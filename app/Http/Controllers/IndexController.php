<?php

namespace App\Http\Controllers;

use App\Classes\Notification;
use App\Services\ReportService;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    protected $reportService;
    public function __construct(ReportService $reportService)
    {
        $this->reportService=$reportService;
        $this->middleware('auth');
    }
    public function index()
    {
        // return Notification::notCollect();
        $data= $this->reportService->getAllReport();
         $log= $this->reportService->getAllLog();
         $income= $this->reportService->getIncomeReport();
         $expense= $this->reportService->getExpenseReport();
         $incomeData=[];
         $incomeLabel=[];
        foreach($income as $key=> $value){
            $incomeData[$key]=$value->total_price;
            $incomeLabel[$key]=$value->date;
        }
        $expenseData=[];
         $expenseLabel=[];
        foreach($expense as $key=> $value){
            $expenseData[$key]=$value->total_price;
            $expenseLabel[$key]=$value->date;
        }
        
        return view('front.index',['data'=>$data,'log'=>$log,'incomeData'=>$incomeData,'expenseData'=>$expenseData,'expenseLabel'=>$expenseLabel,'incomeLabel'=>$incomeLabel]);
    }
}
