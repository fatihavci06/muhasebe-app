<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\ProductOffer;
use App\Models\User;
use App\Services\OfferService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OfferController extends Controller
{
    protected $offerService;
    public function __construct(OfferService $offerService)
    {
        $this->offerService = $offerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
   
        
   
        if ($request->ajax()) {
            $data = $this->offerService->getAllData();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route("offer.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm ml-2" onclick="silmedenSor(\'' . route('offer.delete', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->addColumn('status', function($data){

                    if($data->status==0){
                        $status ="<span class='badge badge-info'>Bekleyen</span>";
                     }elseif($data->status==1){
                        $status ="<span class='badge badge-success'>Onaylı</span>";
                     }
                     else{
                         $status ="<span class='badge badge-danger'>Reddedilmiş</span>";
                     }
                     return $status;
             })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('front.offer.index');
        

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.offer.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
       
        try {
            $this->offerService->createData($request);
            return response()->json(['data' => 'Kayıt Başarılı'], 200);
        }  catch (Exception $e) {
            $response['errors'][0]=$e->getMessage();
            return response()->json($response, 500);
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
          $offer=$this->offerService->getDataById($id);
        
        return view('front.offer.edit',['offer'=>$offer]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, string $id)
    {
    
        
        try {
            $this->offerService->updateData($id,$request);
            return response()->json(['data' => 'Kayıt Başarılı'], 200);
        }  catch (Exception $e) {
            // Diğer istisna türlerini yakala ve işle
            $response['errors'][0]=$e->getMessage();
            return response()->json($response, 500);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     //public function destroy(string $id)  
    
        $this->offerService->deleteData($id);
        //
    
    }
}
