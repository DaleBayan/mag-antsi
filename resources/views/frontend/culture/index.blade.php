@extends('frontend.culture.app')

@section('content')
<style>
  div.seeMore {
    display: -webkit-box;
    max-width: 100%;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
<div class="b-example-divider b-example-vr"></div>

            <div class="w-100">
                <div class="cover-image d-flex align-items-center shadow-sm border-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center py-5">
                                <a class="floating-button d-block d-md-none" data-bs-toggle="offcanvas" href="#offcanvasSideBar" role="button" aria-controls="offcanvasSideBar">
                                  <i class="fa fa-plus mt-3 text-white"></i>
                                </a>
                                <h1 class="fw-bold text-success">{{ $culture->title }}</h1>
                                <p class="lead px-4">{!! $culture->description !!}</p>
                                <a class="btn btn-danger sliding-icon mt-2 py-2">Read more <i class="fa-sharp fa-solid fa-circle-chevron-right ms-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="fw-semibold text-dark">Featured Ritual</h3>
                              @if (isset($selectType))
                                @if ($selectType->media_type == 'Upload')
                                <video width="100%" controls>
                                  <source src="{{ asset('storage/' . $selectType->media) }}" type="video/mp4">
                                  Your browser does not support the video tag.
                                </video>
                                @elseif ($selectType->media_type === 'Embed')
                                  <iframe width="100%" height="400"
                                    src="{{ $selectType->media }}"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                  </iframe>
                                @endif
                              @else
                                <video width="100%" controls>
                                  
                                  Your browser does not support the video tag.
                                </video>
                              @endif
                             
                             
                             
                            <h5 class="fw-bold">
                              @if (isset($selectType))
                                {{ $selectType->title_fil }}
                              @endif  
                            </h5> 
                        </div>
                        <div class="col-12 col-md-6">
                          <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="english-tab" data-bs-toggle="tab" data-bs-target="#bordered-english" type="button" role="tab" aria-controls="english" aria-selected="true">English</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="filipino-tab" data-bs-toggle="tab" data-bs-target="#bordered-filipino" type="button" role="tab" aria-controls="filipino" aria-selected="false" tabindex="-1">Filipino</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="mag-antsi-tab" data-bs-toggle="tab" data-bs-target="#bordered-mag-antsi" type="button" role="tab" aria-controls="mag-antsi" aria-selected="false" tabindex="-1">Mag-Antsi</button>
                            </li>
                          </ul>
                          <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade show active" id="bordered-english" role="tabpanel" aria-labelledby="english-tab">
                              <div class="overflow-auto main-video-height px-3">
                                @if (isset($selectType))
                                  {!! $selectType->body_eng  !!}
                                @endif 
                                
                              </div>
                            </div>
                            <div class="tab-pane fade" id="bordered-filipino" role="tabpanel" aria-labelledby="filipino-tab">
                              <div class="overflow-auto main-video-height px-3">
                                @if (isset($selectType))
                                  {!! $selectType->body_fil  !!}
                                @endif 
                                
                              </div>
                            </div>
                            <div class="tab-pane fade" id="bordered-mag-antsi" role="tabpanel" aria-labelledby="mag-antsi-tab">
                              <div class="overflow-auto main-video-height px-3">
                                @if (isset($selectType))
                                  <img src="{{ asset('storage/' . $selectType->mag_antsi) }}" alt="" width="100%" height="400px">  
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12 border-top border-secondary pt-5">
                        <h3 class="fw-semibold text-dark">Other Ritual</h3>
                      </div>
                    </div>
                    
                    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4">
                      @if (isset($types))
                        @foreach ($types as $type)
                          <div class="col">
                            <div class="card h-100">
                                  @if ($type->media_type == 'Upload')
                                  <video width="100%" controls>
                                    <source src="{{ asset('storage/' . $type->media) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                  </video>
                                  @elseif ($type->media_type === 'Embed')
                                    <iframe width="100%" height="230"
                                      src="{{ $type->media }}"
                                      title="YouTube video player"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                  @endif
                              <div class="card-body">
                                <h5 class="card-title">{{ $type->title_eng }}</h5>
                                <div class="seeMore">
                                  {!! $type->body_eng !!}
                                </div>
                                
                              </div>
                              <a class="btn btn-danger btn-sm sliding-icon mt-2 py-2" href="{{ route('change.culture' ,$type->slug) }}">
                                Watch Now 
                                <i class="fa-sharp fa-solid fa-circle-chevron-right ms-4"></i>
                              </a>
                            </div>
                          </div>
                        @endforeach
                      @endif
                      
                      
                    </div>
                </div>
            </div>

@endsection