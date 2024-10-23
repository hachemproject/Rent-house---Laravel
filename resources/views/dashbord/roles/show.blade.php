@extends('dashbord.globale')
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
                                    role List
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mb-3">
                                <a class="btn btn-sm btn-light text-primary" href="{{ route('roles.index') }}">
                                    <i class="me-1" data-feather="user-plus"></i>
                                    back to roles list
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-fluid px-4">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header"> Permissions</div>
                    <div class="card-body">

                            <div class="row">
                                <div class="col-xs-12 mb-3">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $role->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 mb-3">
                                    <div class="form-group">
                                        <strong>Permissions:</strong>
                                        <br />
                                        @foreach ($rolePermissions as $v)
                                            <label>
                                                {{ $v->name }}</label>
                                            <br />
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        
                    </div>
                </div>
            </div>
        </main>




@endsection
