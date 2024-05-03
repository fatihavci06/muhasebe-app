<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->getAllData();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route("product.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('product.delete', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('front.product.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        
        try {
            $isTrue = $this->productService->createData($request);
            if ($isTrue) {
                
                return redirect()->back()->with('success', 'İşlem başarıyla tamamlandı.');
            } else {
                return redirect()->back()->with('fail', 'İşlem başarısız.');
            }
        } catch (Exception $e) {

            Log::error(json_encode($e->getMessage()));
            return redirect()->back()->with('fail', 'İşlem başarısız.');
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
        $data=$this->productService->getDataById($id);
        return view('front.product.edit',['data'=>$data]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try {
            $this->productService->updateData($id,$request);
            return redirect()->back()->with('success', 'İşlem başarıyla tamamlandı.');
        } catch (Exception $e) {

            Log::error(json_encode($e->getMessage()));
            return redirect()->back()->with('fail', 'İşlem başarısız.');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->productService->deleteData($id);
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
        //
    }
}
