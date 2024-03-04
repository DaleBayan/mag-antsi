@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
<div class="row">
    <div class="col-3"></div>
    
    <div class="p-3 col-6 card border-top border-4 border-success">
        <div class="card-body">

            <h5 class="card-title text-center">Reset Password</h5>
            <p  class="text-center">User: {{ $user->name }}</p>
            <!-- Vertical Form -->
            <form method="POST" action="{{ route('users.resets', Crypt::encryptString($user->id)) }}" class="row gy-5 gx-3 align-items-start">
                @csrf
                @error('reset')
                    <p class="text-danger text-center"><b>{{$message}}</b></p>
                @enderror
                <div class="col-12">
                    <label for="new_password" class="form-label">New Pass</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                    @error('new_password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="retype_password" class="form-label">Re-type Pass</label>
                    <input type="password" class="form-control" name="retype_password" id="retype_password">
                    @error('retype_password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>

    <div class="col-3"></div>

</div>
@endsection