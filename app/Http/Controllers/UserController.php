<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    
    public function index()
    {
        return view('backend.users.index', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(StoreUserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('users.index')->with('message', 'Account Successfully Created');
    }

    public function edit($user)
    {   

        return view('backend.users.edit', [
            'user' => User::find(Crypt::decryptString($user)),
        ]);

    }

    public function update(UpdateUserRequest $request, $user)
    {   
        $user = User::find(Crypt::decryptString($user));
        $user->update($request->validated());

        return redirect()->route('users.index')->with('message', $user->username . ' Account Successfully Updated');

    }

    public function destroy($user)
    {
        $user = User::find(Crypt::decryptString($user));
        $user->delete();

        return redirect()->route('users.index')->with('message', $user->username . ' Account Successfully Deleted'); 
    }
}
