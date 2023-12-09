<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
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
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('customer.delete', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
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
