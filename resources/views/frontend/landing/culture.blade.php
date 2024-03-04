@extends('layouts.frontend.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col px-5 py-3" role="button">
                    <a href="{{ route('culture.type', 'Dance') }}" class="text-decoration-none">
                      {{-- <a href="/culture/magansti/Dance" class="text-decoration-none"> --}}
                        <div class="card h-100 card-hover-animate bg-red">
                            <img src="{{ asset('frontend/assets/img/custom-icons/dances.png')}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h2 class="py-3 text-center text-white"><b>Dances/Sayaw</b></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col px-5 py-3" role="button">
                  <a href="{{ route('culture.type','Song') }}" class="text-decoration-none">
                    <div class="card h-100 card-hover-animate bg-green">
                      <img src="{{ asset('frontend/assets/img/custom-icons/songs.png') }}" class="card-img-top" alt="">
                      <div class="card-body">
                          <h2 class="py-3 text-center text-white"><b>Songs/Awit</b></h2>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col px-5 py-3" role="button">
                  <a href="{{ route('culture.type','Ritual') }}" class="text-decoration-none">
                    <div class="card h-100 card-hover-animate bg-gray">
                      <img src="{{ asset('frontend/assets/img/custom-icons/rituals.png')}}" class="card-img-top" alt="">
                      <div class="card-body">
                          <h2 class="py-3 text-center text-white"><b>Rituals</b></h2>
                      </div>
                    </div>
                  </a>
                </div>
                
              </div>
        </div>
    </div>
</div>
@endsection