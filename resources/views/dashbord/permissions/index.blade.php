@extends('dashboard.dashboard')

@section('content')

    <head>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    
    </head>



                <main>
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-fluid px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="user"></i></div>
                                            Users List
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" href="{{ route('permission.create') }}">
                                            <i class="me-1" data-feather="user-plus"></i>
                                            Add New Permission
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-fluid px-4">
                        <div class="card">
                            <div class="card-body">

                                <table class="table mb-0"id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="border-gray-200" scope="col">Transaction ID</th>
                                            <th class="border-gray-200" scope="col">Date</th>
                                            <th class="border-gray-200" scope="col">Amount</th>
                                            <th class="border-gray-200" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permission as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->Name }}</td>
                                            <td>
                                                <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('permission.edit',$permission->id) }}"><i data-feather="edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark" type="submit" ><i data-feather="trash-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>




@endsection