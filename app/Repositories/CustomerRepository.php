<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll()
    {
        $result = DB::table('customers as c')
            ->leftJoin('payments as p', 'c.id', '=', 'p.customer_id')
            ->select(
                'c.id',
                'c.name',
                'c.surname',
                'c.company_name',
                DB::raw('SUM(CASE WHEN p.type = 0 THEN p.price ELSE 0 END) AS income'),
                DB::raw('SUM(CASE WHEN p.type = 1 THEN p.price ELSE 0 END) AS expense'),
                DB::raw('(SUM(CASE WHEN p.type = 0 THEN p.price ELSE 0 END) - SUM(CASE WHEN p.type = 1 THEN p.price ELSE 0 END)) AS balance')
            )
            ->groupBy('c.id', 'c.name', 'c.surname', 'c.company_name')
            ->get();
        return $result;
    }
    public function getCustomerExtre($customerId)
    {
        $result = DB::table('payments')
            ->select('price', DB::raw("CASE WHEN type = 0 THEN 'Gelir Faturası' WHEN type = 1 THEN 'Gider Faturası' END AS type"), 'created_at')
            ->where('customer_id', $customerId)
            ->get();
        return $result;
    }
    public function getCustomerBalance($customerId)
    {
     
       
        $balance = DB::table('payments')
        ->selectRaw('COALESCE((SELECT SUM(price) FROM payments WHERE type = 0 AND customer_id = ?), 0) - COALESCE((SELECT SUM(price) FROM payments WHERE type = 1 AND customer_id = ?), 0) AS net_total', [$customerId, $customerId])
        ->value('net_total');
        
        return $balance;
    }

    public function find($id)
    {
        return Customer::find($id);
    }

    public function create(array $data)
    {


        $customer = new Customer($data);

        return $customer->save();
    }

    public function update($id, array $data)
    {

        $customer = Customer::findOrFail($id);

        return $customer->update($data);
    }

    public function delete($id)
    {
        $user = Customer::find($id);
        $user->delete();
    }
}
