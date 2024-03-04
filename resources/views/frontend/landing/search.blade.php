@extends('frontend.culture.app')

@section('content')
<div class="b-example-divider b-example-vr"></div>

            <div class="w-100">
                <div class="container mt-5">
                  <div class="row">
                    <div class="col-12 mb-5">
                      <a class="floating-button d-block d-md-none" data-bs-toggle="offcanvas" href="#offcanvasSideBar" role="button" aria-controls="offcanvasSideBar" style="z-index: 9999;">
                        <i class="fa fa-plus mt-3 text-white"></i>
                      </a>
                      <h1 class="fw-bold text-success">Search</h1>
                      <p class="lead mb-5">The Aeta Mag-Antsi community's cultural fabric includes dance profoundly and fundamentally. It serves as a lively representation of their culture, customs, and way of life, all of which have been passed down through the years and are intimately woven into the fabric of their society.</p>
                      <form class="d-flex" role="search" action="{{ route('landing.filter') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-lg mb-3">
                            <div class="form-floating">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Search" value="{{ $search }}">
                                <label for="search">Search</label>
                            </div>
                            <button class="btn btn-success sliding-icon px-4" type="submit" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                      </form>
                      <hr>
                    </div>
                    <div class="col-12 mb-5">
                      <div class="card">
                        <div class="card-body p-0">
                          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTab" role="tablist">
                            <li class="nav-item flex-fill bg-red" role="presentation">
                              <button class="nav-link w-100 text-white active" id="dances-tab" data-bs-toggle="tab" data-bs-target="#bordered-dances" type="button" role="tab" aria-controls="dances" aria-selected="false" tabindex="-1">Dances/Sayaw</button>
                            </li>
                            <li class="nav-item flex-fill bg-green" role="presentation">
                              <button class="nav-link w-100 text-white" id="songs-tab" data-bs-toggle="tab" data-bs-target="#bordered-songs" type="button" role="tab" aria-controls="songs" aria-selected="true">Songs/Awit</button>
                            </li>
                            <li class="nav-item flex-fill bg-gray" role="presentation">
                              <button class="nav-link w-100 text-white" id="rituals-tab" data-bs-toggle="tab" data-bs-target="#bordered-rituals" type="button" role="tab" aria-controls="rituals" aria-selected="false" tabindex="-1">Rituals</button>
                            </li>
                          </ul>
                          <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade p-4 show active" id="bordered-dances" role="tabpanel" aria-labelledby="dances-tab">
                              <div class="row">
                                <div class="col-12">
                                  <h3 class="fw-bold text-dark">Found {{ $contents->where('type', 'Dance')->count() }} Results using: {{ $search }}</h3>
                                  <p class="lead fst-italic">Lorem ipsum dolor sit amet</p>
                                </div>
                              </div>
                              @foreach ($contents->where('type', 'Dance') as $DanceContents)
                                <div class="row border-bottom mb-4 pb-4">
                                    <div class="col-12 col-lg-4">

                                    @if ($DanceContents->media_type == 'Upload')   
                                    <video width="100%" controls>
                                        <source src="{{ asset('storage/' . $DanceContents->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    @else
                                    <iframe width="100%" height="230"
                                      src="{{ $DanceContents->media }}"
                                      title="YouTube video player"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                    @endif
                                    </div>
                                    <div class="col-12 col-lg-8">
                                    <h4 class="card-title">{{ $DanceContents->title_eng }}</h4>
                                    <span class="text-overflow">{!! $DanceContents->body_eng !!}</span>
                                    <a class="btn btn-danger btn-sm sliding-icon mt-2 py-2" href="{{ route('change.culture' ,$DanceContents->slug) }}">Watch Now <i class="fa-sharp fa-solid fa-circle-chevron-right ms-4"></i></a>
                                    </div>
                                </div>
                              @endforeach
                            </div>

                            <div class="tab-pane fade p-4" id="bordered-songs" role="tabpanel" aria-labelledby="songs-tab">
                              <div class="row">
                                <div class="col-12">
                                  <h3 class="fw-bold text-dark">Found {{ $contents->where('type', 'Song')->count() }} Results using: {{ $search }}</h3>
                                  <p class="lead fst-italic">Lorem ipsum dolor sit amet</p>
                                </div>
                              </div>
                              @foreach ($contents->where('type', 'Song') as $SongContents)
                                <div class="row border-bottom mb-4 pb-4">
                                    <div class="col-12 col-lg-4">

                                    @if ($SongContents->media_type == 'Upload')   
                                    <video width="100%" controls>
                                        <source src="{{ asset('storage/' . $SongContents->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    @else
                                    <iframe width="100%" height="230"
                                        src="{{ $SongContents->media }}"
                                        title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                    @endif
                                    </div>
                                    <div class="col-12 col-lg-8">
                                    <h4 class="card-title">{{ $SongContents->title_eng }}</h4>
                                    <span class="text-overflow">{!! $SongContents->body_eng !!}</span>
                                    <a class="btn btn-danger btn-sm sliding-icon mt-2 py-2" href="{{ route('change.culture' ,$SongContents->slug) }}">Watch Now <i class="fa-sharp fa-solid fa-circle-chevron-right ms-4"></i></a>
                                    </div>
                                </div>
                                @endforeach
                              </div>
                            </div>


                            <div class="tab-pane fade p-4" id="bordered-rituals" role="tabpanel" aria-labelledby="rituals-tab">
                              <div class="row">
                                <div class="col-12">
                                  <h3 class="fw-bold text-dark">Found {{ $contents->where('type', 'Ritual')->count() }} Results using: {{ $search }}</h3>
                                  <p class="lead fst-italic">Lorem ipsum dolor sit amet</p>
                                </div>
                              </div>
                              @foreach ($contents->where('type', 'Ritual') as $RitualContents)
                                <div class="row border-bottom mb-4 pb-4">
                                    <div class="col-12 col-lg-4">

                                    @if ($RitualContents->media_type == 'Upload')   
                                    <video width="100%" controls>
                                        <source src="{{ asset('storage/' . $RitualContents->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    @else
                                    <iframe width="100%" height="230"
                                        src="{{ $RitualContents->media }}"
                                        title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                    @endif
                                    </div>
                                    <div class="col-12 col-lg-8">
                                    <h4 class="card-title">{{ $RitualContents->title_eng }}</h4>
                                    <span class="text-overflow">{!! $RitualContents->body_eng !!}</span>
                                    <a class="btn btn-danger btn-sm sliding-icon mt-2 py-2" href="{{ route('change.culture' ,$RitualContents->slug) }}">Watch Now <i class="fa-sharp fa-solid fa-circle-chevron-right ms-4"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
@endsection