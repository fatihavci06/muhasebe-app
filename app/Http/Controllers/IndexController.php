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

        return view('front.index',['data'=>$data]);
    }
}
