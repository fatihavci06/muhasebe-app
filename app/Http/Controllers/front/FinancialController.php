<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinancialRequest;
use App\Services\FinancialService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $financialService;

    public function __construct(FinancialService $financialService) {
        $this->financialService = $financialService;
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = $this->financialService->getAllData();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('Type', function($data){



                if($data->type==0){
                      $btn ='Gelir';
                 }
                 else{
                     $btn ='Gider';
                 }
                 return $btn;
         })
            ->addColumn('action', function ($data) {
                $btn = '<a href="' . route("financial.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('financial.destroy', $data->id) . '\'); return false;">Sil</a>';
                return $btn;
            })
            ->rawColumns(['Type','action'])
            ->make(true);
        }
        return view('front.financial.index');
        //financialService
    }
    public function getAllData(Request $request){
        if($request->type==''){
            $type=0;
        }
        else{
            $type=$request->type;
        }
        $data=$this->financialService->getTypeData($type);

        return response()->json(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('front.financial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinancialRequest $request)
    {

        try {
            $isTrue = $this->financialService->createData($request->all());
            if ($isTrue) {
                return response()->json(['success'=>'Kayıt Başarılı']);
            } else {
                return response()->json(['success'=>'Kayıt Başarısız']);

            }
        } catch (Exception $e) {

            Log::error(json_encode($e->getMessage()));
            return 'Error'.json_encode($e->getMessage());
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
        $data=$this->financialService->getDataById($id);
        return view('front.financial.edit',['data'=>$data]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinancialRequest $request, string $id)
    {

       try {
        $isTrue = $this->financialService->updateData($id,$request->all());
        if ($isTrue) {
            return response()->json(['success'=>'Düzenleme Başarılı']);
        } else {
            return response()->json(['success'=>'Düzenleme Başarısız']);

        }
    } catch (Exception $e) {
        Log::error(json_encode($e->getMessage()));
    }
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $isTrue = $this->financialService->deleteData($id);
            return response()->json(['success'=>'true']);
        } catch (Exception $e) {
            Log::error(json_encode($e->getMessage()));
        }
        //
    }
}
