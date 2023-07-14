@extends('layouts.backend.app')

@section('content')

<div class="row">
    <div class="col-4"></div>

    <div class="p-3 col-4 card border-top border-4 border-success">
        <div class="card-body">
           
            <h5 class="card-title text-center">CHANGE PASSWORD</h5>

            <!-- Vertical Form -->
            <form method="POST" action="{{ route('change_password') }}" class="row gy-3 gx-3 align-items-start">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="current_password">
                    @error('current_password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>

    <div class="col-4"></div>

</div>
@endsection