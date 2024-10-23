@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account reservations</div>
            <div class="card-body">
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Start Date</label>
                            <input class="form-control" id="date_deb" name="date_deb" type="date" placeholder="Enter Start Date" required>
                        </div>
                        <!-- Form Group (birthday)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputBirthday">End Date</label>
                            <input class="form-control" id="date_fin" type="date" name="date_fin"
                                placeholder="Enter End Date" required >
                        </div>
  
<div class="mb-3">
    <label for="category_id" class="form-label">Users</label>
    <select class="form-select" id="user_id" name="user_id" aria-label="Default select example" required>
        <option value="" selected disabled>Select a user:</option>
        @foreach ($users as $users)
        <option value="{{ $users->id }}">{{ $users->email }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">homes</label>
    <select class="form-select" id="home_id" name="home_id" aria-label="Default select example" required>
        <option value="" selected disabled>Select a home:</option>
        @foreach ($home as $home)
        <option value="{{ $home->id }}">{{ $home->id }}</option>
        @endforeach
    </select>
</div>


                    
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
