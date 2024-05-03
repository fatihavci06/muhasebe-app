<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Models\Product;
use Illuminate\Http\Request;

class BankRepository implements BankRepositoryInterface
{
    public function getAllData()
    {
        return Bank::all();
    }

    public function find($id)
    {
        return Bank::find($id);
    }

    public function create(Request $request)
    {

        return  Bank::create($request->except('_token'));
    }

    public function update($id, Request $request)
    {
        $bank = Bank::find($id);
        return $bank->update($request->except(['_method', '_token']));
    }

    public function delete($id)
    {
        $invoice = Bank::find($id);
        $invoice->delete();
    }
}
