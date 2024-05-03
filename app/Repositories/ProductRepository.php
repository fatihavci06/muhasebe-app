<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Models\Product;
use App\Observers\BankObserver;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllData() : \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    public function find($id): ?Product
    {
        
        return Product::find($id);
    }

    public function create(Request $request)
    {

        return  Product::create($request->except('_token'));
    }

    public function update($id, Request $request)
    {
        $bank = Product::find($id);
        return $bank->update($request->except(['_method', '_token']));
    }

    public function delete($id) :void
    {
        $invoice = Product::find($id);
        $invoice->delete();
    }
}
