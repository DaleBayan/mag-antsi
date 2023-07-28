@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />

<form method="POST" action="{{ route('contents.update', Crypt::encryptString($content->id)) }}" enctype="multipart/form-data" class="container">
@csrf
@method('PUT')
    <div class="row">
       
        <div class="col-7">
            
            @if ($content->media_type === 'Embed')
                <iframe width="640" height="360"
                src="{{ $content->media }}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </iframe>
            @elseif ($content->media_type === 'Upload')
                <video width="640" height="360" controls>
                    <source src=" {{ asset('storage/' . $content->media) }}" type="video/mp4">
                </video>
            @else
                 <h3 class="text-danger">No Video Avalaible</h3>
            @endif
           
            <div class="row" x-data="{ mediaState: {{ $content->media_type === 'Embed' ? 'true' : 'false' }}  }" >
                <div class="col-12">
                 
                      <label for="selectOption">Choose to Embed or Upload</label>
                      <div>
                          <input type="radio" name="media_type" id="openOption" value="Embed" x-on:click="mediaState=true" {{ $content->media_type === 'Embed' ? 'checked' : '' }}>
                          <label for="openOption">Embed</label>
                      </div>
                      <div>
                          <input type="radio" name="media_type" id="closeOption" value="Upload" x-on:click="mediaState=false" {{ $content->media_type === 'Upload' ? 'checked' : '' }}>
                          <label for="closeOption">Upload Video/Image</label>
                      </div>
                      @error('media_type')
                      <small class="text-danger">{{$message}}</small>
                      @enderror
          
                      <div  class="mt-1"
                            x-show="mediaState"
                            x-transition:enter.opacity.duration.1000ms        
                            x-cloak>
                        
                          <label for="title_eng" class="form-label">Embed Link</label>
                          <input type="text" class="form-control" name="embed" value="{{ $content->media_type === 'Embed' ? $content->media : '' }}">
                          @error('embed')
                          <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
          
                      <div  class="mt-1"
                            x-show="!mediaState"
                            x-transition:enter.opacity.duration.1000ms
                            x-cloak>
          
                       
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="media">
                        
                            @error('media')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    
                  </div>
                </div>
              </div>
        </div>
        <div class="col-5">
            <div class="w-100 d-flex flex-column gap-3">
                <div class="mb-3 d-flex justify-content-between">
                  
                    <div class="w-50">
                       
                        <label class="form-label">Select Content Type</label>

                        <select class="form-select" aria-label="Default select example" name="type">
                          @foreach ($types as $type)
                            <option value="{{ $type->type }}" {{ $type->type === $content->type ? 'selected' : '' }} >{{ $type->type }}</option>
                          @endforeach
                        </select>
                        
                        @error('type')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </div>
                    <div class="w-25">
                        <label class="form-label">Spotlight</label>
                        <div class="form-check form-switch">
                          
                          <input class="form-check-input p-3 w-100" type="checkbox" role="switch" id="spotlight" name="spotlight" {{ $content->spotlight === 1 ? 'checked' : ''}}>
                 
                        </div>
                        @error('spotlight')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>
                <small class="text-dark">
                    {{ date('F d, Y', strtotime($content->created_at)) }}
                </small>
                <h5 class="my-2 text-dark">
                    <label for="title_eng" class="form-label">Title (English)</label>
                    <input type="text" class="form-control" id="title_eng" name="title_eng" value="{{ $content->title_eng }}">
                    @error('title_eng')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </h5>
                <h5 class="my-2 text-dark">
                    <label for="title_fil" class="form-label">Title (Filipino)</label>
                    <input type="text" class="form-control" id="title_fil" name="title_fil" value="{{ $content->title_fil }}">
                    @error('title_fil')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </h5>
                
            </div>
        </div>
    </div>

    <div class="mt-5 row">
        <div class="col-6 text-dark">
     
            <h5 class="text-success">Post Body (English)</h5>
    
            <textarea class="tinymce-editor" name="body_eng">
                {!! $content->body_eng !!}
            </textarea>
            @error('body_eng')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-6 text-dark">
     
            <h5 class="text-success">Post Body (Filipino)</h5>
    
            <textarea class="tinymce-editor" name="body_fil">
            {!! $content->body_fil !!}
            </textarea>
            @error('body_fil')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-12">
            <h5 class="text-success">Mag-Antsi</h5>
            <img src="{{ asset('storage/' . $content->mag_antsi) }}" alt="" class="mt-1 w-50">
            <div class="form-group">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="mag_antsi">
                @error('mag_antsi')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
        </div>
    </div>

    <div class="my-5 text-center">
        <a href="{{ route('contents.show', Crypt::encryptString($content->id)) }}" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-success">Save</button>
    </div>
</form>

@endsection