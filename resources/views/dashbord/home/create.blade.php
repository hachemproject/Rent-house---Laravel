@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account home</div>
            <div class="card-body">
                <form action="{{ route('home.store') }}" method="POST">
                    @csrf
                    
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Address</label>
                            <input class="form-control" id="adresse" name="adresse" type="text"
                                placeholder="Enter address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">City</label>
                            <input class="form-control" id="ville" name="ville" type="text"
                                placeholder="Enter city" required>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Number of  place</label>
                            <input class="form-control" id="nb_place" name="nb_place" type="number"
                                placeholder="Enter number of  place" required>
                        </div>
                        <div class="col-md-6">
                        <label class="small mb-1" for="inputOrgName">Number of Bath</label>
                        <input class="form-control" id="bath" name="bath" type="number"
                            placeholder="Enter number of bath" required>
                        </div>

                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Price $</label>
                            <input class="form-control" id="prix" name="prix" type="number"
                                placeholder="Enter price" required>
                            
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="num_tel">Phone Number</label>
                            <input class="form-control" id="num_tel" name="num_tel" type="text"
                                placeholder="Enter phone number" pattern="\d{8}" title="Enter exactly 8 digits" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputBirthday">Description</label>
                            <input class="form-control" id="description" name="description" type="text"
                                placeholder="Enter description" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Hotel Categories</label>
                            <select class="form-select" id="category_id" name="category_id" aria-label="Default select example" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
