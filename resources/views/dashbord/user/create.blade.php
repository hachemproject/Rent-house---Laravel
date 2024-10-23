@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">create user</div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Enter your first name" required>
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" id="prenom" name="prenom" type="text"
                                placeholder="Enter your last name"required>
                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="mb-3">
                        <label for="">Roles</label>
                        <select name="roles[]" class="form-control" >
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="email" name="email" type="email"
                            placeholder="Enter your email address" required>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">password</label>
                            <input class="form-control" id="inputFirstName" type="password" name="password"  placeholder="Enter your first name" required />
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">confirm password</label>
                            <input class="form-control" id="inputLastName" type="password" name="password_confirmation"  placeholder="Enter your last name" required />
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
