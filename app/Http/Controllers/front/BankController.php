<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;
use App\Services\BankService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

use function Psy\debug;

class BankController extends Controller
{
    protected $bankService;

    public function __construct(BankService $bankService)
    {
        $this->bankService = $bankService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = $this->bankService->getAllData();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route("bank.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('bank.delete', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('front.bank.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.bank.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request)
    {
        //
        try {
            $isTrue = $this->bankService->createData($request);
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
        $data= $this->bankService->getDataById($id);
        return view('front.bank.edit',['bank'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, string $id)
    {
        //

        try {
            $isTrue = $this->bankService->updateData($id,$request);
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
           $this->bankService->deleteData($id);
            return response()->json(['success'=>true]);
        } catch (Exception $e) {
            Log::error(json_encode($e->getMessage()));
            return response()->json(['success' => false, 'error' => 'Veri silinirken bir hata oluştu.']);
        }
        //
    }
}
