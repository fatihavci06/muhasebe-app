<?php

namespace App\Services;

use App\Repositories\FinancialRepositoryInterface;

class FinancialService
{
    protected $financialRepository;

    public function __construct(FinancialRepositoryInterface $financialRepository) {
        $this->financialRepository = $financialRepository;
    }

    public function getAllData() {
        return $this->financialRepository->getAll();
    }
    public function getTypeData(int $type) {
        return $this->financialRepository->getTypeData($type);
    }

    public function getDataById($id) {
        return $this->financialRepository->find($id);
    }

    public function createData(array $data) {
        return $this->financialRepository->create($data);
    }

    public function updateData($id, array $data) {
        return $this->financialRepository->update($id, $data);
    }

    public function deleteData($id) {
        return $this->financialRepository->delete($id);
    }
}
