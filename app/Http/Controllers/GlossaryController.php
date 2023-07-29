<?php

namespace App\Http\Controllers;
use App\Models\Glossary;
use App\Http\Requests\StoreGlossaryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GlossaryController extends Controller
{
    public function index()
    {
        return view('backend.glossaries.index', [
            'glossaries' => Glossary::select('id', 'term_eng', 'created_at')->get(),
        ]);
    }

    public function create()
    {
        return view('backend.glossaries.create');
    }

    public function store(StoreGlossaryRequest $request)
    {
        $glossaryInfo = $request->validated();

        if($request->hasFile('mag_antsi')) {
            $glossaryInfo['mag_antsi'] = $request->file('mag_antsi')->store('mag-antsi', 'public');
        }

        $glossaryInfo['slug'] = Str::slug($request->term_eng);

        Glossary::create($glossaryInfo);

        return redirect()->route('glossaries.index')->with('message', 'Term Successfully Created');
    }
}
