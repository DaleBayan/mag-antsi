<?php

namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('backend.types.index', [
            'types' => Type::all(),
        ]);
    }

    public function create()
    {
        return view('backend.types.create');
    }

    public function store(Request $request)
    {
        Type::create($request->validate(['type' => 'required|max:50']));

        return redirect()->route('types.index')->with('message', 'Content Type Successfully Created');
    }

    public function destroy($type)
    {
        $type = Type::find(Crypt::decryptString($type));
        $type->delete();

        return redirect()->route('types.index')->with('message', $type->type . ' Content Type Successfully Deleted');
    }
}
