<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\InvoiceTransaction;
use App\Repositories\InvoiceRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceService
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $financialRepository)
    {
        $this->invoiceRepository = $financialRepository;
    }

    public function getAllData()
    {
        return $this->invoiceRepository->getAll();
    }
    public function getAllDataWithCustomer()
    {
        return $this->invoiceRepository->getAllDataWithCustomer();
    }

    public function getDataById($id)
    {
        return $this->invoiceRepository->find($id);
    }

    public function createData(Request $request)
    {

        $invoice = new Invoice;
        $invoice->invoice_type = $request->invoice_type;
        $invoice->invoice_no = $request->faturaNo;
        $invoice->customer_id = $request->musteriId;
        $invoice->invoice_date = $request->faturaTarih;
        $invoice->save();
        for ($i = 0; $i < count($request->adet); $i++) {
            $invoiceTransaction = new InvoiceTransaction;
            $invoiceTransaction->invvoice_id = $invoice->id;
            $invoiceTransaction->pencil_id = $request->kalem[$i];
            $invoiceTransaction->amount = $request->adet[$i];
            $invoiceTransaction->price = $request->tutar[$i];
            $invoiceTransaction->kdv = $request->kdv[$i];
            $invoiceTransaction->kdvtotal = $request->kdvToplam[$i];
            $invoiceTransaction->subtotal = $request->toplamTutar[$i];
            $invoiceTransaction->total = $request->genelToplam[$i];
            $invoiceTransaction->save();
        }
        return true;
    }

    public function updateData($id, array $data)
    {
        return $this->invoiceRepository->update($id, $data);
    }

    public function deleteData($id)
    {
        return $this->invoiceRepository->delete($id);
    }
}
