<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceTransaction;
use App\Services\CustomerService;
use App\Services\FinancialService;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $customerService;
    protected $financialService;
    protected $invoiceService;
    public function __construct(CustomerService $customerService, FinancialService $financialService, InvoiceService $invoiceService)
    {
        $this->customerService = $customerService;
        $this->financialService = $financialService;
        $this->invoiceService = $invoiceService;
    }
    public function index($type = 0)
    {
        if ($type == 0) {
            $customer = $this->customerService->getAllCustomers();
            $financialItem = $this->financialService->getTypeData(0);

            return view('front.invoice.income.create', ['customers' => $customer, 'financialItem' => $financialItem]);
        } else {
            return view('front.invoice.expense.create');
        }

        //
    }


    public function list(Request $request)
    {

        if ($request->ajax()) {
            $data = $this->invoiceService->getAllDataWithCustomer();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('Type', function ($data) {
                    if ($data->invoice_type == 0) {
                        $btn = 'Gelir';
                    } else {
                        $btn = 'Gider';
                    }
                    return $btn;
                })
                ->addColumn('customer', function ($data) {

                    return $data->customer->name;
                })
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route("invoice.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('invoice.destroy', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('front.invoice.index');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {


        DB::beginTransaction();
        try {

            $this->invoiceService->createData($request);
            DB::commit();

            return response()->json(['data' => 'Kayıt Başarılı'], 200);
        } catch (\Exception $e) {
            // Hata durumunda transaction'ı geri al
            DB::rollBack();

            // Hata mesajını işle veya logla
            return response()->json(['error' => 'Transaction failed: ' . $e->getMessage()], 500);
        }

        //
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
        $customers=$this->customerService->getAllCustomers();
        $data= $this->invoiceService->getDataByIdWithCustomer($id);
        $financial= $this->financialService->getDataByType($data->invoice_type);
        return view('front.invoice.income.edit',['customers'=>$customers,'data'=>$data,'financial'=>$financial]);
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
        $this->invoiceService->deleteData($id);
        //
    }
}
