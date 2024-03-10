<?php

namespace App\Services;
use App\Repositories\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepositoryInterface $bankRepository) {
        $this->bankRepository = $bankRepository;
    }

    public function getAllData() {
        return $this->bankRepository->getAllData();
    }


    public function getDataById($id) {
        return $this->bankRepository->find($id);
    }


    public function createData(Request $request) {
        return $this->bankRepository->create($request);
    }

    public function updateData($id, Request $request) {
        return $this->bankRepository->update($id, $request);
    }

    public function deleteData($id) {
        return $this->bankRepository->delete($id);
    }
}
