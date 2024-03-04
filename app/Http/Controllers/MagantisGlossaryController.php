<?php

namespace App\Http\Controllers;
use App\Models\Glossary;
use Illuminate\Http\Request;

class MagantisGlossaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magantsi = 'glossary';
        $glossaries = Glossary::all()->sortBy('term_eng');
        return view('frontend.glossary.index')->with('glossaries', $glossaries)->with('magantsi', $magantsi);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        $magantsi = 'glossary';
        $glossaries = Glossary::orWhere('description_fil','like', '%'.$request->search.'%')
                                ->orWhere('description_eng','like', '%'.$request->search.'%')
                                ->orWhere('term_eng','like', '%'.$request->search.'%')
                                ->orWhere('term_fil','like', '%'.$request->search.'%')
                                ->get();
        return view('frontend.glossary.index')->with('glossaries', $glossaries)->with('magantsi', $magantsi);
    }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
