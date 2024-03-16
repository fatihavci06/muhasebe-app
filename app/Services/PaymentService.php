<?php

namespace App\Services;
use App\Repositories\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository) {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllData() {
        return $this->paymentRepository->getAllData();
    }
    public function getAllDataWithCustomers() {
        return $this->paymentRepository->getAllDataWithCustomers();
    }



    public function getDataById($id) {
        return $this->paymentRepository->find($id);
    }
    public function getDataByIdWithCustomers($id){
        return $this->paymentRepository->getDataByIdWithCustomers($id);
    }


    public function createData(Request $request) {
        return $this->paymentRepository->create($request);
    }

    public function updateData($id, Request $request) {
        return $this->paymentRepository->update($id, $request);
    }

    public function deleteData($id) {
        return $this->paymentRepository->delete($id);
    }
}
