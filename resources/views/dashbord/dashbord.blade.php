@extends('dashbord.globale')

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                        Dashboard
                    </h1>
                    <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    <div class="row">
        <div class="col-xl-4 mb-4">
            <!-- Dashboard example card 1-->
            <a class="card lift h-100" href="{{ route('home.index') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package feather-xl text-primary mb-3"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            <h5>Nombre Homes</h5>
                            <div class="text-muted small">we have {{$homesCount}} homes</div>
                        </div>
                        <img src="/dashbord/assets/img/illustrations/processing.svg" alt="..." style="width: 8rem">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 mb-4">
            <!-- Dashboard example card 2-->
            <a class="card lift h-100" href="{{ route('user.index') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book feather-xl text-secondary mb-3"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                            <h5>Nombre users</h5>
                            <div class="text-muted small">we have {{$usersCount}} users</div>
                        </div>
                        <img src="/dashbord/assets/img/illustrations/browser-stats.svg" alt="..." style="width: 8rem">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 mb-4">
            <!-- Dashboard example card 3-->
            <a class="card lift h-100" href="{{ route('reservations.index') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout feather-xl text-green mb-3"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                            <h5>Nombre reservation</h5>
                            <div class="text-muted small">we have {{$reservationsCount}} reservation</div>
                        </div>
                        <img src="/dashbord/assets/img/illustrations/windows.svg" alt="..." style="width: 8rem">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-8">
            <!-- Tabbed dashboard card example-->
            <div class="card mb-4">
                
                <div class="card-body">
                    <div class="tab-content" id="dashboardNavContent">
                        <!-- Dashboard Tab Pane 1 -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-pill">
                            <div class="chart-area mb-4 mb-lg-0" style="height: 20rem">
                                <canvas id="myAreaChart" width="878" height="400" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                        <!-- Dashboard Tab Pane 2 -->
                        <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-pill">
                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-container">
                                    <table id="datatablesSimple" class="datatable-table">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true"><button class="datatable-sorter">Date</button></th>
                                                <th data-sortable="true"><button class="datatable-sorter">Event</button></th>
                                                <th data-sortable="true"><button class="datatable-sorter">Time</button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Contenu de votre tableau ici -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Time</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Pagination et autres éléments -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('myAreaChart').getContext('2d');
                    const labels = [];
                    const data = [];
                
                    @foreach($reservations as $reservation)
                        labels.push('{{ Carbon\Carbon::create()->month($reservation->month)->format('F') }} {{ $reservation->year }}');
                        data.push({{ $reservation->count }});
                    @endforeach
                
                    const myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Réservations par Mois',
                                data: data,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 2,
                                fill: false
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Mois'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Nombre de Réservations'
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
            <!-- Illustration dashboard card example-->
            <div class="card mb-4">
                
            </div>
            <div class="row">
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard activity timeline example-->
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Recent Activity
                            
                        </div>
                        <div class="card-body">
                            <div class="timeline timeline-xs">
                                <!-- Timeline Item 1-->
                                @foreach ($messages as $message)
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">
                                            @if ($message->days_since_created == 0)
                                            Today
                                        @elseif ($message->days_since_created == 1)
                                            {{ $message->days_since_created }} day
                                        @else
                                            {{ $message->days_since_created }} days
                                        @endif
                                    </div>
                                        <div class="timeline-item-marker-indicator bg-green"></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <a class="fw-bold text-dark" href="{{ route('AffichMessage', $message->id) }}">{{ $message->subject }}</a>
                                    </div>
                                </div>
                            @endforeach
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <!-- Team members / people dashboard card example-->
                    <div class="card mb-4">
                        <div class="card-header">People</div>
                        <div class="card-body">

                            @foreach ($user as $user)
                            <!-- Item 1-->
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center flex-shrink-0 me-3">
                                    <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="/dashbord/assets/img/illustrations/profiles/profile-1.png" alt=""></div>
                                    <div class="d-flex flex-column fw-bold">
                                        <p class="text-dark line-height-normal mb-1" >{{ $user->name }}</p>
                                        <div class="small text-muted line-height-normal">{{ $user->roles[0]->name }}</div>
                                    </div>
                                </div>
                               
                            </div>
                            @endforeach
                
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card">
                
            </div>
        </div>
    </div>
</div>
@endsection
