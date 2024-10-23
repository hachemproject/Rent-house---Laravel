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
                                            Categorie List
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" href="{{ route('permission.index') }}">
                                            <i class="me-1" data-feather="user-plus"></i>
                                            back to Permissions list
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
                            <div class="card-header">Add Permission</div>
                            <div class="card-body">
                                <form action="{{ route('permission.store') }}" method="POST">
                                    @csrf 
                                    <!-- Form Row-->
                                    <div class="mb-3"> Add Permission</label>
                                        <input class="form-control" type="text" name="Name" placeholder="Enter your email address" value="" required/>
                                    </div>
                                    <!-- Submit button-->
                                    <button type="submit" class="btn btn-primary" type="button">Add user</button>
                                </form>
                            </div>
                        </div>
                    </div>   
                </main>




@endsection