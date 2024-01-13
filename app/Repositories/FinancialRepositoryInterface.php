<?php
namespace App\Repositories;

interface FinancialRepositoryInterface {
    public function getAll();
    public function getTypeData($type);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

