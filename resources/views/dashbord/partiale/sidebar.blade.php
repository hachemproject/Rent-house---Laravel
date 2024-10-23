<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">

            <div class="nav accordion" id="accordionSidenav">


                <a class="nav-link" href="{{ route('dashboord.index') }}">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Dashbord
                </a>


                @can('user-list')
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Users
                    </a>
                @endcan
                @can('role-list')
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Roles
                    </a>
                @endcan
                @can('categorie-list')
                    <a class="nav-link" href="{{ route('categorys.index') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Categorys
                    </a>
                @endcan
                @can('home-list')
                    <a class="nav-link" href="{{ route('home.index') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Homes
                    </a>
                @endcan
                @can('reservation-list')
                    <a class="nav-link" href="{{ route('reservations.index') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Reservations
                    </a>
                @endcan
                @can('message-list')
                    <a class="nav-link" href="{{ route('messages.index') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Messages
                    </a>
                @endcan
                <a class="nav-link" href="{{ route('accueil') }}" style="font-weight: bold;color: blue;">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    ACCUEIL
                </a>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </nav>
</div>
