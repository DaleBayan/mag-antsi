@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />

<div class="container">
    
   <div class="row">

        <div class="p-3 card col-5 mx-auto">
            <h5 class="card-title text-success">Term (English)</h5>
            <b>{{ $glossary->term_eng }}</b>
        </div>
        
        <div class="p-3 card col-5 mx-auto">
            <h5 class="card-title text-success">Term (Filipino)</h5>
            <b>{{ $glossary->term_fil }}</b>
        </div>
     
   </div>

   <div class="row">

        <div class="p-3 card col-5 mx-auto">
            <h5 class="card-title text-success">Description (English)</h5>
            {!! $glossary->description_eng !!}
        </div>
        
        <div class="p-3 card col-5 mx-auto">
            <h5 class="card-title text-success">Description (Filipino)</h5>
            {!! $glossary->description_fil !!}
        </div>
 
    </div>

    <div class="row">

        <div class="p-3 card col-11 mx-auto">
            @isset($glossary->mag_antsi)
                <h5 class="card-title text-success">Mag-Antsi</h5>
                <img src="{{ asset('storage/' . $glossary->mag_antsi) }}" alt="" class="mx-auto w-50 text-center">
            @else
                <h1 class="p-3 text-danger text-center">No Mag-Antsi Avalaible</h1>  
            @endisset
        </div>
        
    </div>

    <div class="my-5 text-center">
        <a href="{{ route('glossaries.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('glossaries.edit', Crypt::encryptString($glossary->id)) }}" class="btn btn-warning">Edit</a>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContentModal">Delete</button>
    </div>

</div>



@endsection