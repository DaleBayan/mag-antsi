<?php

namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;

class TypeController extends Controller
{
    public function index()
    {
        return view('backend.types.index', [
            'show' => 'file',
            'active' => 'content type',
            'types' => Type::all(),
        ]);
    }

    public function create()
    {
        return view('backend.types.create',[
            'show' => 'file',
            'active' => 'content type',
            ]);
    }

    public function store(StoreTypeRequest $request)
    {
        $type = $request->validated(); 
        Type::create($type);

        return redirect()->route('types.index')->with('message', 'Content Type Successfully Created');
    }
    public function edit(Request $request, $id) {
        
    }
    
    public function destroy($type)
    {
        $type = Type::find(Crypt::decryptString($type));
        $type->delete();

        return redirect()->route('types.index')->with('message', $type->type . ' Content Type Successfully Deleted');
    }
}
