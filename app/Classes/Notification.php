<?php


namespace App\Classes;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class Notification
{

    public static function notCollect()
    {



        return $results = DB::table('invoices as i')
            ->select('c.id as customer_id', 'c.name as customer_name', 'c.surname as customer_surname', 'i.id as invoice_id', 'i.invoice_type as type')
            ->selectSub(function ($query) {
                $query->select(DB::raw('SUM(total)'))
                    ->from('invoice_transactions as it')
                    ->whereColumn('it.invvoice_id', 'i.id');
            }, 'total')
            ->leftJoin('payments as p', function ($join) {
                $join->on('p.invoice_id', '=', 'i.id');
            })
            ->join('customers as c', 'c.id', '=', 'i.customer_id')
            ->where('i.invoice_type', 0)
            ->whereNull('p.invoice_id')
            ->get();

        //    return Invoice::where('invoice_type',0)->whereDoesntHave('payments')->with(['customer:id,name,surname','transactions'])->get();

    }
}
