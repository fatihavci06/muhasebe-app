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

        if (!empty($data['photo'])) {
            $customer->photo = Storage::putFile('images', $data['photo']);
        }

        return $customer->save();

    }

    public function update($id, array $data) {
        $customer = Customer::findOrFail($id);

        // Eğer photo değeri boş değilse ve yeni bir dosya yüklenmişse
        if (!empty($data['photo'])) {
            // Yeni dosyayı yükle
            $customer->photo = Storage::putFile('images', $data['photo']);
        }
        $excludedKey = 'photo';

        // $excludedKey anahtarını hariç tutarak yeni bir dizi oluştur
        $filteredData = array_filter($data, function ($key) use ($excludedKey) {
            return $key !== $excludedKey;
        }, ARRAY_FILTER_USE_KEY);
        return $customer->update($filteredData);

    }

    public function delete($id) {
        $user = Customer::find($id);
        $user->delete();
    }
}
