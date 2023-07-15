<?php

namespace App\Http\Controllers;
use App\Models\UserRole;
use App\Http\Requests\StoreUserRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('backend.user_roles.index', [
            'user_roles' => UserRole::all(),
        ]);
    }

    public function create()
    {
        return view('backend.user_roles.create');
    }

    public function store(StoreUserRoleRequest $request)
    {
       UserRole::create($request->validated());

       return redirect()->route('user_roles.index')->with('message', 'Role Successfully Created');
    }

    public function destroy($user_role)
    {
        $user_role = UserRole::find(Crypt::decryptString($user_role));
        $user_role->delete();

        return redirect()->route('user_roles.index')->with('message', $user_role->user_role . ' Role Successfully Deleted'); 
    }
}
