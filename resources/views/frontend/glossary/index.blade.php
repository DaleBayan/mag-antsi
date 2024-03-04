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
            <h1 class="fw-bold text-success">Glossary</h1>
            <p class="lead mb-5">The Aeta Mag-Antsi community's cultural fabric includes dance profoundly and fundamentally. It serves as a lively representation of their culture, customs, and way of life, all of which have been passed down through the years and are intimately woven into the fabric of their society.</p>
            <form class="d-flex" method="POST" action="{{ route('glossary.filter') }}">
                @csrf
                <div class="input-group input-group-lg mb-3">
                    <div class="form-floating">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Filter">
                        <label for="search">Filter</label>
                    </div>
                    <button class="btn btn-success sliding-icon px-4" type="submit" id="search"><i class="fa-solid fa-filter"></i></button>
                </div>
            </form>
            <hr>
        </div>
        <div class="col-12 mb-5">
            <div class="card">
            <div class="card-body">
                <h3 class="card-title fw-bold tex-dark">Glossary</h3>
                <!-- Accordion without outline borders -->
                <div class="accordion accordion-flush" id="accordionGlossary">
                    @php
                        $glossaries = $glossaries->groupBy(function ($item, $key) {
                            return strtoupper(substr($item['term_eng'], 0, 1));
                        });
                    @endphp
                    @foreach ($glossaries as $letter => $items)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $letter }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $letter }}" aria-expanded="true" aria-controls="collapse{{ $letter }}">
                                    {{ $letter }}
                                </button>
                            </h2>
                            <div id="collapse{{ $letter }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $letter }}">
                                <div class="accordion-body">
                                  
                                        @foreach ($items as $item)
                                            <!-- You can include other item information here -->
                                            <div class="row border rounded mb-3 pb-3 align-items-center">
                                                <div class="col-12 col-lg-3">
                                                    <img src="{{ asset('storage/' . $item->mag_antsi) }}" alt="" class="w-100">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <h4 class="card-title">{{ $item->term_eng }}</h4>
                                                    <p class="card-text">{!! $item->description_eng !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- End Accordion without outline borders -->

            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection