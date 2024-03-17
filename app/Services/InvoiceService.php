<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\InvoiceTransaction;
use App\Repositories\InvoiceRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvoiceService
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
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
    public function getDataByType($type=1)
    {
        return $this->invoiceRepository->findType($type);
    }
    public function getDataByIdWithCustomer($id)
    {
        return $this->invoiceRepository->getDataByIdWithCustomer($id);
    }
    public function createData(Request $request)
    {
        DB::beginTransaction();
        try{
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
            DB::commit();
            return  true;

        }catch(Exception $e){
            Log::info($e->getMessage());
            DB::rollBack();
            return false;
        }



    }

    public function updateData($id, Request $request)
    {
        DB::beginTransaction();
        try {

            $this->invoiceRepository->update($id, $request);
            $invoiceTransaction = InvoiceTransaction::where('invvoice_id', $id)->delete();
            for ($i = 0; $i < count($request->adet); $i++) {
                $invoiceTransaction = new InvoiceTransaction;
                $invoiceTransaction->invvoice_id = $id;
                $invoiceTransaction->pencil_id = $request->kalem[$i];
                $invoiceTransaction->amount = $request->adet[$i];
                $invoiceTransaction->price = $request->tutar[$i];
                $invoiceTransaction->kdv = $request->kdv[$i];
                $invoiceTransaction->kdvtotal = $request->kdvToplam[$i];
                $invoiceTransaction->subtotal = $request->toplamTutar[$i];
                $invoiceTransaction->total = $request->genelToplam[$i];
                $invoiceTransaction->save();
            }
            DB::commit();
            return true;

        } catch (\Exception $e) {
            // Hata durumunda transaction'ı geri al
            DB::rollBack();

            // Hata mesajını işle veya logla
            return false;
        }
    }

    public function deleteData($id)
    {
        return $this->invoiceRepository->delete($id);
    }
}
