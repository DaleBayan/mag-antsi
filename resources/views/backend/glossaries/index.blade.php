@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fa-solid fa-book me-2"></i>GLOSSARY</h5>
                <a href="{{ route('glossaries.create') }}" class="btn btn-sm btn-primary">Create a Term</a>
            </div>
            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th scope="col">Term</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($glossaries as $glossary)
                <tr>
                    <td>{{ $glossary->term_eng }}</td>
                    <td>{{ date('F d, Y', strtotime($glossary->created_at)) }}</td>
                    <td>
                      <a href="{{ route('glossaries.show', Crypt::encryptString($glossary->id)) }}" class="btn btn-info btn-sm">View</a>
                      <a href="" class="btn btn-primary btn-sm">Attachments</a>
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