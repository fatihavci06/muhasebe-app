<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface PaymentRepositoryInterface {
    public function getAllData();
    public function getAllDataWithCustomers();
    public function find($id);
    public function getDataByIdWithCustomers($id);
    public function getDataWithTypeCount($type);
    public function create(Request $request);
    public function update($id, Request $request);
    public function delete($id);
}

