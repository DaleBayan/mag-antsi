<div class="side-bar d-flex flex-column flex-shrink-0 p-3 d-none d-md-block shadow border-end">
    <a href="/" class="d-flex align-items-center justify-content-center">
        <img src="{{ asset('frontend/assets/img/logo-vertical.png') }}" class="v-logo">
    </a>
    <div class="mb-5">
        <ul class="nav flex-column mb-auto">
            <li class="nav-item text-capitalize">
                <a href="{{ route('landing.index') }}" class="nav-link">
                    <img src="{{ asset('frontend/assets/img/custom-icons/home.png')}}" class="side-bar-icon-primary">
                    Home
                </a>
            </li>
            <li class="nav-item text-capitalize">
                <a href="{{ route('culture.index') }}" class="nav-link {{ isset($magantsi) ? ($magantsi =='culture' ? 'active' : ''): '' }}">
                    <img src="{{ asset('frontend/assets/img/custom-icons/culture.png')}}" class="side-bar-icon-primary">
                    Culture
                </a>
            </li>
            <li class="nav-item text-capitalize">
                <a href="{{ route('glossary.index') }}" class="nav-link {{ isset($magantsi) ? ($magantsi =='glossary' ? 'active' : ''): '' }}">
                    <img src="{{ asset('frontend/assets/img/custom-icons/glossary.png')}}" class="side-bar-icon-primary">
                    Glossary
                </a>
            </li>
        </ul>
    </div>
    <div class="mx-3">
        <h5 class="fw-semibold text-dark">Culture</h5>
        <div class="card mb-3 bg-transparent shadow-none border-0" role="button">
            <a href="{{ route('culture.type','Dance') }}" class="text-decoration-none">
              <div class="row g-0">
                <div class="col-md-2 p-0 card-hover-animate bg-red">
                  <img src="{{ asset('frontend/assets/img/custom-icons/dances.png')}}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-10 d-flex align-items-center ps-2">
                  <div class="card-body p-0">
                    <h5 class="text-danger text-decoration-none m-0 p-0">Dances/Sayaw</h5>
                  </div>
                </div>
              </div>
            </a>
        </div>

        <div class="card mb-3 bg-transparent shadow-none border-0" role="button">
          <a href="{{ route('culture.type','Song') }}" class="text-decoration-none">
            <div class="row g-0">
              <div class="col-md-2 p-0 card-hover-animate bg-green">
                <img src="{{ asset('frontend/assets/img/custom-icons/songs.png')}}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-10 d-flex align-items-center ps-2">
                <div class="card-body p-0">
                  <h5 class="text-success text-decoration-none m-0 p-0">Songs/Awit</h5>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="card mb-3 bg-transparent shadow-none border-0" role="button">
          <a href="{{ route('culture.type','Ritual') }}" class="text-decoration-none">
            <div class="row g-0">
              <div class="col-md-2 p-0 card-hover-animate bg-gray">
                <img src="{{ asset('frontend/assets/img/custom-icons/rituals.png')}}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-10 d-flex align-items-center ps-2">
                <div class="card-body p-0">
                  <h5 class="text-dark text-decoration-none m-0 p-0">Rituals</h5>
                </div>
              </div>
            </div>
          </a>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-start offcanvas-side-bar" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasSideBar" aria-labelledby="offcanvasSideBarLabel">
  <div class="offcanvas-header d-flex justify-content-end">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="{{ route('landing.index') }}" class="d-flex align-items-center justify-content-center">
      <img src="{{ asset('frontend/assets/img/logo-vertical.png')}}" class="v-logo">
    </a>
    <div class="mb-5">
        <ul class="nav flex-column mb-auto">
            <li class="nav-item text-capitalize">
                <a href="{{ route('landing.index') }}" class="nav-link">
                    <img src="{{ asset('frontend/assets/img/custom-icons/home.png')}}" class="side-bar-icon-primary">
                    Home
                </a>
            </li>
            <li class="nav-item text-capitalize">
                <a href="{{ route('culture.index') }}" class="nav-link active">
                    <img src="{{ asset('frontend/assets/img/custom-icons/culture.png')}}" class="side-bar-icon-primary">
                    Culture
                </a>
            </li>
            <li class="nav-item text-capitalize">
                <a href="glossary.html" class="nav-link">
                    <img src="{{ asset('frontend/assets/img/custom-icons/glossary.png')}}" class="side-bar-icon-primary">
                    Glossary
                </a>
            </li>
        </ul>
    </div>
    <div class="mx-3">
        <h5 class="fw-semibold text-dark">Culture</h5>
        <div class="card mb-3 bg-transparent shadow-none border-0" role="button">
            <a href="{{ route('culture.type','Dance')  }}" class="text-decoration-none">
              <div class="row g-0">
                <div class="col-2 p-0 card-hover-animate bg-red">
                  <img src="{{ asset('frontend/assets/img/custom-icons/dances.png') }}" class="img-fluid rounded-start">
                </div>
                <div class="col-10 d-flex align-items-center ps-2">
                  <div class="card-body p-0">
                    <h5 class="text-danger text-decoration-none m-0 p-0">Dances/Sayaw</h5>
                  </div>
                </div>
              </div>
            </a>
        </div>

        <div class="card mb-3 bg-transparent shadow-none border-0" role="button">
          <a href="{{ route('culture.type','Song')  }}" class="text-decoration-none">
            <div class="row g-0">
              <div class="col-2 p-0 card-hover-animate bg-green">
                <img src="{{ asset('frontend/assets/img/custom-icons/songs.png')}}" class="img-fluid rounded-start">
              </div>
              <div class="col-10 d-flex align-items-center ps-2">
                <div class="card-body p-0">
                  <h5 class="text-success text-decoration-none m-0 p-0">Songs/Awit</h5>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="card mb-3 bg-transparent shadow-none border-0" role="button">
          <a href="{{ route('culture.type','Ritual')  }}" class="text-decoration-none">
            <div class="row g-0">
              <div class="col-2 p-0 card-hover-animate bg-gray">
                <img src="{{ asset('frontend/assets/img/custom-icons/rituals.png')}}" class="img-fluid rounded-start">
              </div>
              <div class="col-10 d-flex align-items-center ps-2">
                <div class="card-body p-0">
                  <h5 class="text-dark text-decoration-none m-0 p-0">Rituals</h5>
                </div>
              </div>
            </div>
          </a>
        </div>
    </div>
  </div>
</div>