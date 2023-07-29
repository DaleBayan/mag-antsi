@extends('layouts.backend.app')

@section('content')

<form method="POST" action="{{ route('glossaries.store') }}" enctype="multipart/form-data" class="container">
@csrf
    {{-- [START] - Row for Content Type, Title English, and Title Filipino --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">CREATE TERM FORM</h5>

                  <div class="row g-3">
                      
                      <div class="col-6">
                        <label for="term_eng" class="form-label">Term (English)</label>
                        <input type="text" class="form-control" id="term_eng" name="term_eng" value="{{ old('term_eng') }}">
                        @error('term_eng')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <div class="col-6">
                        <label for="term_fil" class="form-label">Term (Filipino)</label>
                        <input type="text" class="form-control" id="term_fil" name="term_fil" value="{{ old('term_fil') }}">
                        @error('term_fil')
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
                  <h5 class="card-title">Description (English)</h5>
    
                  <textarea class="tinymce-editor" name="description_eng">
                    {!! old('description_eng') !!}
                  </textarea>
                  @error('description_eng')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Description (Filipino)</h5>
    
                  <textarea class="tinymce-editor" name="description_fil">
                    {!! old('description_fil') !!}
                  </textarea>
                  @error('description_fil')
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

    <div class="my-5 text-center">
      <a href="{{ route('glossaries.index') }}" class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-success">Submit</button>
    </div>

</form>

  

@endsection