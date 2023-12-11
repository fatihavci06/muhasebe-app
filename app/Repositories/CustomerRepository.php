<?php
namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class CustomerRepository implements CustomerRepositoryInterface {
    public function getAll() {
        return Customer::all();
    }

    public function find($id) {
        return Customer::find($id);
    }

    public function create(array $data) {


        $customer = new Customer($data);

        return $customer->save();

    }

    public function update($id, array $data) {

        $customer = Customer::findOrFail($id);

        return $customer->update($data);

    }

    public function delete($id) {
        $user = Customer::find($id);
        $user->delete();
    }
}
