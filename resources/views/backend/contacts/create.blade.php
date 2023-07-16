@extends('layouts.backend.app')

@section('content')

<div class="row">
    <div class="col-3"></div>

    <div class="p-3 col-6 card border-top border-4 border-success">
        <div class="card-body">
           
            <h5 class="card-title text-center">CREATE A CONTACT FORM</h5>

            <!-- Vertical Form -->
            <form method="POST" action="{{ route('contacts.store') }}" class="row gy-3 gx-3">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" value="{{old('full_name')}}">
                    @error('full_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" name="mobile_number" pattern="[0]{1}[0-9]{10}" value="{{old('mobile_number')}}">
                    @error('mobile_number')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation" value="{{old('designation')}}">
                    @error('designation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>

    <div class="col-3"></div>

</div>
@endsection