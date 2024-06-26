<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use App\Services\InvoiceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    protected $customerService;
    protected $invoiceService;

    public function __construct(CustomerService $customerService,InvoiceService $invoiceService)
    {
        $this->customerService = $customerService;
        $this->invoiceService = $invoiceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //


        if ($request->ajax()) {
            $data = $this->customerService->getAllCustomers();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route("customer.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn .= '<a href="' . route("customer.extre", $data->id) . '" class="extre btn btn-success btn-sm ml-2">Ekstre</a>';
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm ml-2" onclick="silmedenSor(\'' . route('customer.delete', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->addColumn('balance', function($data){



                    if($data->balance>0){
                        $btn ='<b >'.$data->balance.' TL</b>';
                     }
                     else{
                         $btn ='<b style="color: red;">'.$data->balance.'</b>';
                     }
                     return $btn;
             })
                ->rawColumns(['action','balance'])
                ->make(true);
        }
        return view('front.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('front.customer.create');
        //
    }
    public function extre($id)
    {
        $customer=$this->customerService->getCustomerById($id);
        $extre=$this->customerService->getCustomerExtre($id);
         $balance=$this->customerService->getCustomerBalance($id);
        return view('front.customer.extre',['customer'=>$customer,'extre'=>$extre,'balance'=>$balance]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {

        try {
            $isTrue = $this->customerService->createCustomer($request->all());
            if ($isTrue) {
                return redirect()->back()->with('success', 'İşlem başarıyla tamamlandı.');
            } else {
                return redirect()->back()->with('fail', 'İşlem başarısız.');
            }
        } catch (Exception $e) {
            Log::error(json_encode($e->getMessage()));
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
        $customer=$this->customerService->getCustomerById($id);

        return view('front.customer.edit',['customer'=>$customer]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        //
        try {
            $isTrue = $this->customerService->updateCustomer($id,$request->all());
            if ($isTrue) {
                return redirect()->back()->with('success', 'İşlem başarıyla tamamlandı.');
            } else {
                return redirect()->back()->with('fail', 'İşlem başarısız.');
            }
        } catch (Exception $e) {
            Log::error(json_encode($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $isTrue = $this->customerService->deleteCustomer($id);
            return response()->json(['success'=>'true']);
        } catch (Exception $e) {
            Log::error(json_encode($e->getMessage()));
        }

        //
    }
}
