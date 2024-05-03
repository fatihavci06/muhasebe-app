<?php

namespace App\Services;


use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function getAllData() {
        return $this->productRepository->getAllData();
    }


    public function getDataById($id) {
        return $this->productRepository->find($id);
    }


    public function createData(Request $request) {
        return $this->productRepository->create($request);
    }

    public function updateData($id, Request $request) {
        
        return $this->productRepository->update($id, $request);
    }

    public function deleteData($id) {
        return $this->productRepository->delete($id);
    }
}
