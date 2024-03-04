@extends('layouts.backend.app')

@section('content')
<style>
  div.seeMore {
  white-space: nowrap; 
  width: 200px; 
  overflow: hidden;
  text-overflow: "..."; 
}
</style>
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body" >
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fa-solid fa-hourglass-start"></i>AUDIT TRAIL</h5>
            </div>
            <div style="overflow-x:auto;">
              <table class="table datatable" >
                <thead>
                  <tr>
                    <th scope="col">Editor</th>
                    <th scope="col">Model</th>
                    {{-- <th scope="col">IP</th> --}}
                    <th scope="col">Event</th>
                    <th scope="col">Old Value</th>
                    <th scope="col">New Value</th>
                    <th scope="col">DATE</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $audits as $audit)
                  <tr>
                      <td>{{ $audit->user->name}}</td>
                      <td>{{ $audit->auditable_type }}</td>
                      {{-- <td>{{ $audit->ip_address }}</td> --}}
                      <td>{{ $audit->event }}</td>
                      <td><div class="seeMore">{{ $audit->old_values }}</div></td>
                      <td><div class="seeMore">{{ $audit->new_values }}</div></td>
                      <td>{{ $audit->created_at->format('M d,Y H:i:s') }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
            
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection