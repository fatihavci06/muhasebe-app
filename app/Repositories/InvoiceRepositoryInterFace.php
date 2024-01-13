<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface InvoiceRepositoryInterface {
    public function getAll();
    public function find($id);
    public function create(Request $request);
    public function update($id, array $data);
    public function delete($id);
}

