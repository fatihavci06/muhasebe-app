<?php
namespace App\Repositories;


use App\Models\FinancialStatement;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceRepository implements InvoiceRepositoryInterface {
    public function getAll() {
        return Invoice::all();
    }
    public function getAllDataWithCustomer() {
        return Invoice::with('customer')->get();
    }

    public function find($id) {
        return Invoice::find($id);
    }

    public function create(Request $request) {


        $invoice = new Invoice($request->all());

        return $invoice->save();

    }

    public function update($id, array $data) {

        $invoice = Invoice::findOrFail($id);

        return $invoice->update($data);

    }

    public function delete($id) {
        $invoice = Invoice::find($id);
        $invoice->delete();
    }
}
