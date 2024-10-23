@extends('dashbord.globale')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>Message sent by: {{$message->name}}
                        </h1>
                        <div class="page-header-subtitle">{{$message->email}}</div>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4">
        <!-- Knowledge base article-->
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="ms-3"><h2 class="my-3">{{$message->subject}}</h2></div>
            </div>
            <div class="card-body">
                <p class="lead">{{$message->message}}</p>
                
            </div>
        </div>
        <!-- Knowledge base rating-->
       
    </div>
</main>
@endsection
