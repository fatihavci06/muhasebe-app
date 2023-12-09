<?php
namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CustomerService {
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository) {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomers() {
        return $this->customerRepository->getAll();
    }

    public function getCustomerById($id) {
        return $this->customerRepository->find($id);
    }

    public function createCustomer(array $data) {

        return $this->customerRepository->create($data);
    }

    public function updateCustomer($id, array $data) {

        return $this->customerRepository->update($id, $data);
    }

    public function deleteCustomer($id) {
        return $this->customerRepository->delete($id);
    }
}

