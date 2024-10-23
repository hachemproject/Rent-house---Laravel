<nav class="navbar navbar-expand-lg">
    <div class="container bg-white" style="z-index: 9">
        <div class="nav-logo d-flex align-items-center flex-column">
            <i class="uil uil-estate text-primary" style="font-size: 2rem"></i>
            <a class="navbar-brand me-0" href="#" style="margin-top: -0.9rem">Dre<span
                    class="text-primary fw-bold">a</span>m
                <span class="text-primary fw-bold">Home</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('accueil') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        @if ($categorys->isEmpty())
                        <li class="dropdown-item">No categories available</li>
                        @else
                        @foreach ($categorys as $categorys)
                            <li>
                                <a class="dropdown-item" href="{{ route('HomeByCateg', $categorys->id) }}">{{ $categorys->nom }}</a>
                            </li>
                        @endforeach
                        @endif

                    </ul>

                </li>
                

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('message') }}">Contact</a>
                </li>
                @guest
                <li>
                    <a href="{{ route('login') }}"
                    class="btn d-inline-flex justify-content-center align-items-center btn-primary mb-4 mb-md-0">
                    login
                </a>
                </li>
                <li>
                    <a href="{{ route('register') }}"
                    class="btn d-inline-flex justify-content-center align-items-center btn-primary mb-4 mb-md-0">
                    register
                </a>

                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.edit') }}" class="dropdown-item">setting</a></li>
                        <li><a href="{{ route('reservationClient') }}" class="dropdown-item">reservation</a></li>
                        @can('admin')
                        <li><a href="{{ route('dashboord.index') }}" class="dropdown-item">dashbord</a></li>
                        @endcan
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                        <li>                                            
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();"class="dropdown-item">
                                Logout
                            </a>
                        </li>
                    </form>   
                    </ul>
                </li>
            @endguest




            </ul>
        </div>
    </div>
</nav>
