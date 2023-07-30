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
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGlossary{{ $glossary->id }}">Delete</button>
    </div>

</div>

{{-- [START] - Delete All Attachments Modal --}}
<div class="modal fade" id="deleteGlossary{{ $glossary->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Are you sure you want to delete <b>{{ $glossary->term_eng }}</b>? All of the term attachments would also be deleted.
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form method="POST" action="{{ route('glossaries.destroy', Crypt::encryptString($glossary->id)) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-success">Confirm</button>
        </form>
        </div>
    </div>
    </div>
</div>
{{-- [END] - Delete All Attachments Modal --}}


@endsection