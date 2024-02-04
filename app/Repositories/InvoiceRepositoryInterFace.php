<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface InvoiceRepositoryInterface {
    public function getAll();
    public function getAllDataWithCustomer();
    public function getDataByIdWithCustomer($id);
    public function find($id);
    public function create(Request $request);
    public function update($id, Request $request);
    public function delete($id);
}

