<?php
namespace App\Repositories;

interface CustomerRepositoryInterface {
    public function getAll();
    public function getCustomerExtre($customerId);
    public function getCustomerBalance($customerId);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

