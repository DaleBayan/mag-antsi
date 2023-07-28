@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />

<div class="container">
    
    <div class="row">
       
        <div class="col-7">

            @if (isset($content->media) && $content->media_type === 'Embed')
                <iframe width="640" height="360"
                src="{{ $content->media }}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </iframe>
            @elseif (isset($content->media) && $content->media_type === 'Upload')
                <video width="640" height="360" controls>
                    <source src=" {{ asset('storage/' . $content->media) }}" type="video/mp4">
                </video>
            @else
                 <h1 class="p-5 text-danger text-center">No Video Avalaible</h1>
            @endif
           
           
        </div>
        <div class="col-5">
            <div class="w-100 d-flex flex-column gap-3">
                <div class="mb-3 d-flex justify-content-between">
                    <small class="badge bg-success">
                        {{ Str::upper($content->type) }}
                    </small>
                    <small class="align-self-start {{ $content->spotlight === 1 ? 'badge bg-warning text-dark' : 'badge bg-secondary'}}">
                        <i class="fa-solid fa-star me-1"></i>
                        SPOTLIGHT
                    </small>
                </div>
                <small class="text-dark">
                    {{ date('F d, Y', strtotime($content->created_at)) }}
                </small>
                <h5 class="my-2 text-dark">
                    <b>{{ $content->title_eng }}</b> (English)
                </h5>
                <h5 class="my-2 text-dark">
                    <b>{{ $content->title_fil }}</b> (Filipino)
                </h5>
                
            </div>
        </div>
    </div>

    <div class="mt-3 row gap-3">
        <div class="col-12 text-dark">
            <h5 class="text-success">English</h5>
            {!! $content->body_eng !!}
        </div>
        <div class="col-12 text-dark">
            <h5 class="text-success">Filipino</h5>
            {!! $content->body_fil !!}
        </div>
        <div class="col-12">
            <h5 class="text-success">Mag-Antsi</h5>
            @isset($content->mag_antsi)
                <img src="{{ asset('storage/' . $content->mag_antsi) }}" alt="" class="mt-1 w-50 text-center">
            @else
                <h1 class="p-5 text-danger text-center">No Mag-Antsi Avalaible</h1>  
            @endisset
           
        </div>
    </div>

    <div class="my-5 text-center">
        <a href="{{ route('contents.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('contents.edit', Crypt::encryptString($content->id)) }}" class="btn btn-warning">Edit</a>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContentModal{{ $content->id }}">Delete</button>
    </div>

    {{-- [START] - Delete User Modal --}}
    <div class="modal fade" id="deleteContentModal{{$content->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Are you sure you want to delete <b>{{ $content->title_eng }}</b>?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form method="POST" action="{{ route('contents.destroy', Crypt::encryptString($content->id)) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-success">Confirm</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{-- [END] - Delete User Modal --}}

</div>

@endsection