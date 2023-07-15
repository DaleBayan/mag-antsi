@extends('layouts.backend.app')

@section('content')

<div class="row">
    <div class="col-3"></div>

    <div class="p-3 col-6 card border-top border-4 border-success">
        <div class="card-body">
           
            <h5 class="card-title text-center">CREATE A USER ROLE FORM</h5>

            <!-- Vertical Form -->
            <form method="POST" action="{{ route('user_roles.store') }}" class="row gy-3 gx-3 ">
                @csrf
                <div class="col-6">
                    <label for="inputNanme4" class="form-label">User Role</label>
                    <input type="text" class="form-control" name="user_role" value="{{old('user_role')}}">
                    @error('user_role')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                 
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" style="resize: none;">
                            {{ old('description') }}
                        </textarea>
                    </div>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
               
                <div class="text-center">
                    <a href="{{ route('user_roles.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>

    <div class="col-3"></div>

</div>
@endsection