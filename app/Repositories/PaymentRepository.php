<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getAllData()
    {
        return Payment::all();
    }
    public function getDataByIdWithCustomers($id)
    {

        return Payment::with([
            'customers' => function ($query) {
                $query->select('id', 'name', 'surname');
            },

            'invoices' => function ($query) {
                $query->select('id', 'invoice_no');
            },
            'banks' => function ($query) {
                $query->select('id', 'name');
            }



        ])->where('id', $id)->first();
    }
    public function getAllDataWithCustomers()
    {
        return Payment::with('customers')->get();
    }

    public function find($id)
    {
        return Payment::find($id);
    }

    public function create(Request $request)
    {

        return  Payment::create($request->except('_token'));
    }

    public function update($id, Request $request)
    {
        return Payment::where('id', $id)->update($request->except(['_method', '_token']));
    }

    public function delete($id)
    {
        $invoice = Payment::find($id);
        $invoice->delete();
    }
}
