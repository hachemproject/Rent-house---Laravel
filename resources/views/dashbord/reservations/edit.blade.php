@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">edit reservations</div>
            <div class="card-body">
                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Start Date</label>
                            <input class="form-control" id="date_deb" name="date_deb" type="date"  value="{{ $reservation->date_deb }}" placeholder="Enter date_deb" required>
                        </div>
                        <!-- Form Group (birthday)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputBirthday">End Date</label>
                            <input class="form-control" id="date_fin" type="date" name="date_fin"  value="{{ $reservation->date_fin }}" 
                                placeholder="Enter date_fin" required >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Users</label>
                        <select class="form-select" id="user_id" name="user_id" aria-label="Default select example" required>
                            <option value="" disabled {{ old('user_id', $selectedUserId ?? '') == '' ? 'selected' : '' }}>Select a user:</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $selectedUserId ?? '') == $user->id ? 'selected' : '' }}>
                                    {{ $user->email }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="home_id" class="form-label">Homes</label>
                        <select class="form-select" id="home_id" name="home_id" aria-label="Default select example" required>
                            <option value="" disabled {{ old('home_id', $selectedHomeId ?? '') == '' ? 'selected' : '' }}>Select a home:</option>
                            @foreach ($homes as $home)
                                <option value="{{ $home->id }}" {{ old('home_id', $selectedHomeId ?? '') == $home->id ? 'selected' : '' }}>
                                    {{ $home->id }} <!-- Vous pouvez remplacer ceci par une propriété descriptive, comme $home->name -->
                                </option>
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
