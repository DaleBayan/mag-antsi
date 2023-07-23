@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />

<div class="container">
    
    <div class="row">
       
        <div class="col-7">

            <video width="640" height="360" controls>
                <source src=" {{ asset('storage/' . $content->media) }}" type="video/mp4">
            </video>
           
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
        <div class="col-12">
            <h5 class="text-success">English</h5>
            <p class="text-dark">{{ strip_tags($content->body_eng) }}</p> 
        </div>
        <div class="col-12">
            <h5 class="text-success">Filipino</h5>
            <p class="text-dark">{{ strip_tags($content->body_fil) }}</p> 
        </div>
        <div class="col-12">
            <h5 class="text-success">Mag-Antsi</h5>
            <img src="{{ asset('storage/' . $content->mag_antsi) }}" alt="" class="mt-1 w-50">
        </div>
    </div>

    <div class="my-3 text-center">
        <a href="{{ route('contents.index') }}" class="btn btn-secondary">Back</a>
        <a href="" class="btn btn-warning">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
    </div>
</div>

@endsection