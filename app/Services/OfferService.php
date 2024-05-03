<?php

namespace App\Services;

use App\Models\Offer;
use App\Models\OfferProduct;
use App\Repositories\OfferRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OfferService
{
    protected $offerRepository;

    public function __construct(OfferRepositoryInterface $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function getAllData()
    {
        return $this->offerRepository->getAllData();
    }


    public function getDataById($id)
    {
        return $this->offerRepository->find($id);
    }
    public function createOfferProduct(Request $request, $id)
    {
        $products = [];

        for ($i = 0; $i < count($request->name); $i++) {
            $products[] = ['name' => $request->name[$i], 'quantity' => $request->quantity[$i], 'price' => $request->price[$i], 'offer_id' => $id];
        }
        Log::info(json_encode($products));
        return OfferProduct::insert($products);
    }

    public function createData(Request $request)
    {
        DB::beginTransaction();
        try {
            $offer = new Offer;
            $offer->status = 0;
            $offer->user_id = Auth::id();
            $offer->save();
            $this->createOfferProduct($request,$offer->id);
            
            DB::commit();
            return  true;
        } catch (Exception $e) {

            DB::rollBack();
            return $e;
        }
    }

    public function updateData($id, Request $request)
    {
        
        DB::beginTransaction();
        try {
           
            Offer::where('id', $id)->update(['status' => $request->status]);

            OfferProduct::where('offer_id',$id)->delete();
            $this->createOfferProduct($request,$id);


            DB::commit();
            return $response['status'] = true;
        } catch (Exception $e) {
            // Hata durumunda transaction'ı geri al
            Log::error('Bir hata oluştu: ' . $e->getMessage());

            DB::rollBack();
            throw $e;
        }
    }

    public function deleteData($id)
    {
        return $this->offerRepository->delete($id);
    }
}
