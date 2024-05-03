<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getAllData() {
        return $this->userRepository->getAllData();
    }


    public function getDataById($id) {
        return $this->userRepository->find($id);
    }


    public function createData(Request $request) {
        return $this->userRepository->create($request);
    }

    public function updateData($id, Request $request) {
        return $this->userRepository->update($id, $request);
    }

    public function deleteData($id) {
        return $this->userRepository->delete($id);
    }
}
