<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    
    public function index()
    {
        return view('backend.change_password.index',[
            'show' => 'system setup',
            'active' => 'change password'
        ]);
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('dashboard')->with('message', 'Password changed successfully.');
        } else {
            return back()->withErrors(['current_password' => 'Incorrect current password.']);
        }
    }

}
