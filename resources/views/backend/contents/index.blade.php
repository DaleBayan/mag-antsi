@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"> <i class="fa-solid fa-photo-film"></i>Contents</h5>
                <a href="{{ route('contents.create') }}" class="btn btn-sm btn-primary">Create a Content</a>
            </div>
            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Spotlight</th>
                    <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->type }}</td>
                    <td>{{ $content->title_eng }}</td>
                    <td>{{ date('M d, Y', strtotime($content->created_at)) }}</td>
                    <td>{{ $content->spotlight === 1 ? 'Yes' : 'No' }}</td>
                    <td>
                      <a href="{{ route('contents.show', Crypt::encryptString($content->id)) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
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