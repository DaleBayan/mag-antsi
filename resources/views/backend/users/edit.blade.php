@extends('layouts.backend.app')

@section('content')

<div class="row">
    <div class="col-3"></div>

    <div class="p-3 col-6 card border-top border-4 border-success">
        <div class="card-body">
       
            <h5 class="card-title text-center">EDIT {{ $user->username }} INFORMATION</h5>
               
            <!-- Vertical Form -->
            <form method="POST" action="{{ route('users.update', Crypt::encryptString($user->id)) }}" class="row gy-5 gx-3 align-items-start">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <label class="col-12 form-label">Select User Role</label>
                    <div class="col-12">
                        <select class="form-select" aria-label="Default select example" name="user_role">
                            <option selected value="Content Creator">Content Creator</option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                        </select>
                    </div>
                    @error('user_role')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
              
                <div class="col-6">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inputEmail4" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                    @error('username')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>

    <div class="col-3"></div>

</div>
@endsection