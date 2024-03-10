<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Services\BankService;
use App\Services\CustomerService;
use App\Services\InvoiceService;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paymentService;
    protected $customerService;
    protected $invoiceService;
    protected $bankService;

    public function __construct(PaymentService $paymentService,CustomerService $customerService, InvoiceService $invoiceService,BankService $bankService)
    {
        $this->paymentService = $paymentService;
        $this->customerService = $customerService;
        $this->invoiceService = $invoiceService;
        $this->bankService = $bankService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices= $this->invoiceService->getDataByType(1);
        $customers= $this->customerService->getAllCustomers();
        $banks=$this->bankService->getAllData();
        return view('front.payment.create',['customers'=>$customers,'invoices'=>$invoices,'banks'=>$banks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        //

        try {

            $isTrue = $this->paymentService->createData($request);
            if ($isTrue) {
                return redirect()->back()->with('success', 'İşlem başarıyla tamamlandı.');
            } else {
                return redirect()->back()->with('fail', 'İşlem başarısız.');
            }
        } catch (Exception $e) {

            Log::error(json_encode($e->getMessage()));
            return false;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
