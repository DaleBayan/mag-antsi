<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        $user = Auth::user();
        if($user->user_role == 'Super Admin'){
            return view('backend.users.index', [
                'show' => 'system setup',
                'active' => 'user',
                'users' => User::all(),
            ]);
        }
        else{
            return redirect(route('dashboard'));
        }
    }

    public function create()
    {
        return view('backend.users.create',[
            'show' => 'system setup',
            'active' => 'user',
        ]);
    }

    public function store(StoreUserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('users.index')->with('message', 'Account Successfully Created');
    }

    public function edit($user)
    {   

        return view('backend.users.edit', [
            'show' => 'system setup',
            'active' => 'user',
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
    public function editPassword($user)
    {
        return view('backend.users.reset_password', [
            'show' => 'system setup',
            'active' => 'user',
            'user' => User::find(Crypt::decryptString($user)),
        ]);
    }
    public function resetPassword(ResetPasswordRequest $request, $user) {
        if ($request->retype_password === $request->new_password) {
            $user = User::find(Crypt::decryptString($user));
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect(route('users.index'))->with('message', $user->username . ' Account Successfully Reset Password');
        }
        else{
            return back()->withErrors(['reset' => 'New password and Retype password not match.']);
        }
            
    }
}
