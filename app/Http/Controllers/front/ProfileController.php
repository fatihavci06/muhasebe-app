<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('front.profile.edit',['user'=>$user]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request)
    {
        try {

            $user = User::find(Auth::id());
            if(!empty($request->file('photo'))){
                $user->photo=Storage::putFile('photo', $request->file('photo'));  //storage burda

            }
            if ($request->filled('password')) {
                $user->password->bcrypt($request->password);

            }
            $user->name=$request->name;
            $user->name=$request->email;
            $user->name=$request->name;
            $user->save();
            return redirect()->back()->with('success','Kayıt Başarılı');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('fail','Kayıt Başarısız');
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
