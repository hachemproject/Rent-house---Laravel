@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">create categorys</div>
            <div class="card-body">
                <form action="{{ route('categorys.store') }}" method="POST">
                    @csrf
                    
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                       
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Name</label>
                            <input class="form-control" id="nom" name="nom" type="text" placeholder="Enter name" required>
                        </div>
                    </div>
                   
                    
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
