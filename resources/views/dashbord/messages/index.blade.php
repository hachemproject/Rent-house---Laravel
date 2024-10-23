@extends('dashbord.globale')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg></div>
                            Account Settings - Billing
                        </h1>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">


        <div class="card mb-4">
            <div class="card-header">Billing History</div>
            <div class="card-body p-0">
                <!-- Billing history table-->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-gray-200" scope="col">ID</th>
                                <th class="border-gray-200" scope="col">Name</th>
                                <th class="border-gray-200" scope="col">Email</th>
                                <th class="border-gray-200" scope="col">Date</th>
                                <th class="border-gray-200" scope="col">Details</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donnees as $messages)
                                <tr>
                                    @if ($messages->is_active == 0)
                                    
                                    <td><span class="badge bg-green me-2">New</span>{{ $messages->id }}</td>
                                    @else
                                    <td>{{ $messages->id }}</td>
                                    @endif
                                    <td>{{ $messages->name }}</td>
                                    <td>{{ $messages->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($messages->created_at)->format('d M Y') }}</td>

                                    <td><a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('AffichMessage', $messages->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
