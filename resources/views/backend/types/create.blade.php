@extends('layouts.backend.app')

@section('content')

<div class="row">
    <div class="col-4"></div>
    
    <div class="p-3 col-4 card border-top border-4 border-success">


        <div class="card-body">
           
            <h5 class="card-title text-center">CREATE A CONTENT TYPE</h5>

            <form method="POST" action="{{ route('types.store') }}" class="row gy-3 gx-3">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Type</label>
                    <input type="text" class="form-control" name="type" value="{{old('type')}}">
                    @error('type')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('types.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>

    <div class="col-4"></div>

</div>
@endsection