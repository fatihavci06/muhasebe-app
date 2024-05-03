<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    public function getAllData()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create(Request $request)
    {

        return  User::create($request->except('_token'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password!=null){
            $user->password=bcrypt($request->password);
        }
        $user->save();
        return $user;
    }

    public function delete($id)
    {
        $invoice = User::find($id);
        $invoice->delete();
    }
}
