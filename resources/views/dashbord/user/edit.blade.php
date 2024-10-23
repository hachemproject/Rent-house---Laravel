@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <div class="card mb-4">
            <div class="card-header">edit user</div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}"
                                placeholder="Enter your first name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" id="prenom" name="prenom" type="text" value="{{ $user->prenom }}"
                                placeholder="Enter your last name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Roles</label>
                        <select name="roles[]" class="form-control" >
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="email" name="email" type="email" value="{{ $user->email }}"
                            placeholder="Enter your email address" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
