@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fa-solid fa-address-book me-2"></i>CONTACTS</h5>
                <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary">Create a Contact</a>
            </div>
            
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Full Name</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $contacts as $contact)
                <tr>
                    <td>{{$contact->full_name }}</td>
                    <td>{{$contact->mobile_number}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->designation}}</td>
                    <td>{{date('M d, Y', strtotime($contact->created_at))}}</td>
                    <td>
                        <a href="{{ route('contacts.edit', Crypt::encryptString($contact->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserRoleModal{{$contact->id}}">Delete</button>
                    </td>
                </tr>

                {{-- [START] - Delete Contact Modal --}}
                <div class="modal fade" id="deleteUserRoleModal{{$contact->id}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete <b>{{ $contact->full_name }}</b>?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <form method="POST" action="{{ route('contacts.destroy', Crypt::encryptString($contact->id)) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-success">Confirm</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- [END] - Delete Contact Modal --}}

                @endforeach
              </tbody>
            </table>
            
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection