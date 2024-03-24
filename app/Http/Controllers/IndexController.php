<?php

namespace App\Http\Controllers;

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
        $data= $this->reportService->getAllReport();

        return view('front.index',['data'=>$data]);
    }
}
