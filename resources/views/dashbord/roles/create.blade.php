@extends('dashbord.globale')

@section('content')


</head>
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            roles List
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
            <div class="card-header">Add Roles</div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">

                            </div>
                        </div>
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br />
                                @foreach ($permission as $value)
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                        {{ $value->name }}</label>
                                    <br />
                                @endforeach

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" type="button">Add Roles</button>

                    </div>
                </form>  
            </div>
        </div>
    </div>
</main>

@endsection