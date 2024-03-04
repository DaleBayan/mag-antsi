<nav class="navbar navbar-expand-lg bg-transparent mt-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('frontend/assets/img/logo-full.png')}}" alt="" class="img logo d-none d-sm-block d-md-block d-lg-block d-xl-block" />
            <img src="{{ asset('frontend/assets/img/logo.png')}}" alt="" class="img logo d-block d-sm-none d-md-none d-lg-none d-xl-none" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-none d-lg-flex me-auto">&nbsp;</div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link mx-3 {{ request()->is('/') ? 'active': '' }}" aria-current="page" href="{{ route('landing.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3  {{ request()->is('culture') ? 'active': '' }}" href="{{ route('culture.index') }}">Culture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="{{ route('glossary.index') }}">Glossary</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('landing.filter') }}" method="POST">
                @csrf
                <div class="input-group input-group-lg mb-3">
                    <div class="form-floating">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                        <label for="search">Search</label>
                    </div>
                    <button class="btn btn-success sliding-icon px-4" type="submit" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
</nav>