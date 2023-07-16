@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
    
        <div class="card">
          <div class="card-body">
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fa-solid fa-photo-film me-2"></i>CONTENT TYPES</h5>
                <a href="{{ route('types.create') }}" class="btn btn-sm btn-primary">Create a Content Type</a>
            </div>
            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Type</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($types as $type)
                <tr>
                    <td>{{ $type->type }}</td>
                    <td>{{ date('M d, Y', strtotime($type->created_at)) }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContentTypeModal{{ $type->id }}">Delete</button>
                    </td>
                </tr>

                {{-- [START] - Delete Content Type Modal --}}
                <div class="modal fade" id="deleteContentTypeModal{{ $type->id }}" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete <b>{{ $type->type }}</b>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('types.destroy', Crypt::encryptString($type->id)) }}">
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
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
