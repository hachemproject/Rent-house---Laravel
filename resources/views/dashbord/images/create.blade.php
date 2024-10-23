@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account home</div>
            <div class="card-body">
                <form action="{{ route('store.image', $IdHome) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="photos">Photos</label>
                            <input class="form-control" name="image" type="file" required>

                        </div>
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
