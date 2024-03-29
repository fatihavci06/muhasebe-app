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
    public function getDataByIdWithCustomer($id){

        return Invoice::with(['customer','transactions'])->where('id',$id)->first();
    }

    public function find($id) {
        return Invoice::find($id);
    }
    public function findType($type) {
        return Invoice::where('invoice_type',$type)->get();
    }

    public function create(Request $request) {


        $invoice = new Invoice($request->all());

        return $invoice->save();

    }

    public function update($id, Request $request) {

        $invoice = Invoice::findOrFail($id);
        $invoice->invoice_type = $request->invoice_type;
        $invoice->invoice_no = $request->faturaNo;
        $invoice->customer_id = $request->musteriId;
        $invoice->invoice_date = $request->faturaTarih;

        return $invoice->save();

    }

    public function delete($id) {
        $invoice = Invoice::find($id);
        $invoice->delete();
    }
}
