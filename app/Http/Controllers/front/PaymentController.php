<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\InvoiceTransaction;
use App\Services\BankService;
use App\Services\CustomerService;
use App\Services\InvoiceService;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

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
    public function index(Request $request)
    {
        $data = $this->paymentService->getAllDataWithCustomers();

        if ($request->ajax()) {

            return DataTables::of($data)
            ->addColumn('date', function ($data) {

                return $data->date;
            })
            ->addColumn('customer', function ($data) {

                return $data->customers->name.' '.$data->customers->surname;
            })
            ->addColumn('type', function ($data) {
                if($data->type==0){
                    return 'Ödeme';
                }
                elseif($data->type==1){
                    return 'Tahsilat';
                }
                else{
                    return '--';
                }

            })
            ->addColumn('action', function ($data) {
                $btn = '<a href="' . route("payment.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('payment.destroy', $data->id) . '\'); return false;">Sil</a>';
                return $btn;
            })
            ->rawColumns(['action','date','type','customer'])
            ->make(true);
        }
        return view('front.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id=null)
    {

        $customers= $this->customerService->getAllCustomers();
        $banks=$this->bankService->getAllData();
        if($id!=null){
            $invoice= $this->invoiceService->getDataById($id);
            $invoices= $this->invoiceService->getDataByType(0);
            $total=InvoiceTransaction::where('invvoice_id',$id)->sum('total');
            return view('front.payment.createwithId',['customers'=>$customers,'total'=>$total,'invoices'=>$invoices,'invoice'=>$invoice,'banks'=>$banks]);
        }
        $invoices= $this->invoiceService->getDataByType(1);
        return view('front.payment.create',['customers'=>$customers,'invoices'=>$invoices,'banks'=>$banks]);
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
            return redirect()->back()->with('fail', 'İşlem başarısız.');
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
        $payment= $this->paymentService->getDataByIdWithCustomers($id);
        $customers=$this->customerService->getAllCustomers();
        $banks=$this->bankService->getAllData();
        $invoices= $this->invoiceService->getDataByType($payment->type);
        return view('front.payment.edit',['customers'=>$customers,'invoices'=>$invoices,'banks'=>$banks,'payment'=>$payment]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        //
        try {
            $isTrue = $this->paymentService->updateData($id,$request);
            if ($isTrue) {
                return redirect()->back()->with('success', 'İşlem başarıyla tamamlandı.');
            } else {
                return redirect()->back()->with('fail', 'İşlem başarısız.');
            }
        } catch (Exception $e) {
            Log::error(json_encode($e->getMessage()));
            return response()->json(['success' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->paymentService->deleteData($id);
             return response()->json(['success'=>true]);
         } catch (Exception $e) {
             Log::error(json_encode($e->getMessage()));
             return response()->json(['success' => false, 'error' => 'Veri silinirken bir hata oluştu.']);
         }
        //
    }
}
