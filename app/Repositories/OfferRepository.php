<?php

namespace App\Repositories;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfferRepository implements OfferRepositoryInterface
{
    public function getAllData()
    {
        if (Auth::user()->is_admin) {
            return  DB::table('offers as o')
                ->select('o.status', 'u.name AS user_name', 'o.id', DB::raw('SUM(op.price) AS total_price'))
                ->join('offer_product as op', 'op.offer_id', '=', 'o.id')
                ->join('users as u', 'u.id', '=', 'o.user_id')
                ->groupBy('o.user_id', 'o.id', 'o.status', 'u.name', 'o.id')
                ->get();
        }
        else{
            return  DB::table('offers as o')
        ->select('o.status', 'u.name AS user_name','o.id', DB::raw('SUM(op.price) AS total_price'))
        ->join('offer_product as op', 'op.offer_id', '=', 'o.id')
        ->join('users as u', 'u.id', '=', 'o.user_id')
        ->where('user_id',Auth::id())
        ->groupBy('o.user_id', 'o.id', 'o.status', 'u.name','o.id')
        ->get();
        }
    }

    public function find($id)
    {
        return Offer::with('products')->findOrFail($id);
    }

    public function create(Request $request)
    {

        return  Offer::create($request->except('_token'));
    }

    public function update($id, Request $request)
    {
        $Offer = Offer::find($id);
        return $Offer->update($request->except(['_method', '_token']));
    }

    public function delete($id)
    {
        $invoice = Offer::find($id);
        $invoice->delete();
    }
}
