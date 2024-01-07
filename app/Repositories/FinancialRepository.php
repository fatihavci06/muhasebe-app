<?php
namespace App\Repositories;


use App\Models\FinancialStatement;
use Illuminate\Support\Facades\Storage;

class FinancialRepository implements FinancialRepositoryInterface {
    public function getAll() {
        return FinancialStatement::all();
    }

    public function find($id) {
        return FinancialStatement::find($id);
    }

    public function create(array $data) {


        $financial = new FinancialStatement($data);

        return $financial->save();

    }

    public function update($id, array $data) {

        $financial = FinancialStatement::findOrFail($id);

        return $financial->update($data);

    }

    public function delete($id) {
        $financial = FinancialStatement::find($id);
        $financial->delete();
    }
}
