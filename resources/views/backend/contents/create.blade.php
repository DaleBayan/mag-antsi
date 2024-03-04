@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
<form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data" class="container">
@csrf
    {{-- [START] - Row for Content Type, Title English, and Title Filipino --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">CREATE CONTENT FORM</h5>

                  <div class="row g-3">
                      <div class="col-3">
                       
                        <label class="form-label">Select Content Type</label>

                        <select class="form-select" aria-label="Default select example" name="type">
                          @foreach ($types as $type)
                            <option value="{{ $type->type }}" {{ $loop->first ? 'selected' : '' }} >{{ $type->type }}</option>
                          @endforeach
                        </select>
                        @error('type')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <div class="col-3"></div>

                      <div class="col-4">
                        <label class="form-label">Spotlight</label>
                        <div class="form-check form-switch">
                          
                          <input class="form-check-input p-3 w-25" type="checkbox" role="switch" id="spotlight" name="spotlight">
                 
                        </div>
                        @error('spotlight')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <div class="col-6">
                        <label for="title_eng" class="form-label">Title (English)</label>
                        <input type="text" class="form-control" id="title_eng" name="title_eng" value="{{ old('title_eng') }}">
                        @error('title_eng')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <div class="col-6">
                        <label for="title_fil" class="form-label">Title (Filipino)</label>
                        <input type="text" class="form-control" id="title_fil" name="title_fil"  value="{{ old('title_fil') }}">
                        @error('title_fil')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                  </div>
    
                </div>
              </div>
        </div>
    </div>
    {{-- [END] - Row for Content Type, Title English, and Title Filipino --}}

    {{-- [START] - Row for Post Body English and Filipino --}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Post Body (English)</h5>
    
                  <textarea class="tinymce-editor" name="body_eng">
                    {{ old('body_eng') }}
                  </textarea>
                  @error('body_eng')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Post Body (Filipino)</h5>
    
                  <textarea class="tinymce-editor" name="body_fil">
                    {{ old('body_fil') }}
                  </textarea>
                  @error('body_fil')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
        </div>
    </div>
    {{-- [END] - Row for Post Body English and Filipino --}}

    {{-- [START] - Uploading Mag-Ansti Image --}}
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Upload Mag-Antsi</h5>
            <div class="form-group">
              <label for="exampleFormControlFile1">Upload Video File</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="mag_antsi">
              @error('mag_antsi')
              <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- [START] - Uploading Mag-Ansti Image --}}

    {{-- [START] - Embeding or Uploading Video --}}
    <div class="row" x-data="{ mediaState: true }">
      <div class="col-12">
        <div class="card p-2">
          <div class="card-body">
            <h5 class="card-title">Upload Video</h5>
            
            <label for="selectOption">Choose to Embed or Upload</label>
            <div>
                <input type="radio" name="media_type" id="openOption" value="Embed" x-on:click="mediaState=true" checked>
                <label for="openOption">Embed</label>
            </div>
            <div>
                <input type="radio" name="media_type" id="closeOption" value="Upload" x-on:click="mediaState=false" >
                <label for="closeOption">Upload Video/Image</label>
            </div>
            @error('media_type')
            <small class="text-danger">{{$message}}</small>
            @enderror

            <div  class="mt-5"
                  x-show="mediaState"
                  x-transition:enter.opacity.duration.1000ms        
                  x-cloak>
                <label for="title_eng" class="form-label">Embed Link</label>
                <input type="text" class="form-control" name="embed" value="{{ old('embed') }}">
                @error('embed')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div  class="mt-5"
                  x-show="!mediaState"
                  x-transition:enter.opacity.duration.1000ms
                  x-cloak>

             
                <div class="form-group">
                  <label for="exampleFormControlFile1">Upload Video File</label>
                  <input type="file" class="form-control-file" name="media">
                  @error('media')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
             

            </div>

          </div>
        </div>
      </div>
    </div>
    {{-- [END] - Embeding or Uploading Video --}}
   

   

    <div class="my-5 text-center">
      <a href="{{ route('contents.index') }}" class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-success">Submit</button>
    </div>

</form>

  

@endsection