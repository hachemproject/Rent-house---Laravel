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
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('user.create') }}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add New user
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if (session('success'))
    <div id="successAlert" class="alert alert-success fade show" role="alert">
        {{ session('success') }}
    </div>

    <script>
        // Ferme l'alerte après 5 secondes
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) {
                const bootstrapAlert = new bootstrap.Alert(alert);
                bootstrapAlert.close();
            }
        }, 3000); // 3000 millisecondes = 5 secondes
    </script>
@endif
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
                                <th class="border-gray-200" scope="col">Last Name</th>
                                <th class="border-gray-200" scope="col">First Name</th>
                                <th class="border-gray-200" scope="col">Email</th>
                                <th class="border-gray-200" scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donnees as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->prenom }}</td>
                                    <td>{{ $user->email }}</td>
                                     <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{ route('user.edit', $user->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark"  type="submit" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>                                        
                                        </form>
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
