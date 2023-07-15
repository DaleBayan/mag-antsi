@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fa-solid fa-user-gear me-2"></i>USER ROLES</h5>
                <a href="{{ route('user_roles.create') }}" class="btn btn-sm btn-primary">Create a User Role</a>
            </div>
            
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">User Role</th>
                  <th scope="col">Description</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $user_roles as $user_role)
                <tr>
                    <td>{{$user_role->user_role}}</td>
                    <td>{{$user_role->description}}</td>
                    <td>{{date('m d, Y', strtotime($user_role->created_at))}}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserRoleModal{{$user_role->id}}">Delete</button>
                    </td>
                </tr>

                {{-- [START] - Delete User Modal --}}
                <div class="modal fade" id="deleteUserRoleModal{{$user_role->id}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete <b>{{ $user_role->user_role }}</b> Role?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <form method="POST" action="{{ route('user_roles.destroy', Crypt::encryptString($user_role->id))}}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-success">Confirm</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- [END] - Delete User Modal --}}

                @endforeach
              </tbody>
            </table>
            
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection