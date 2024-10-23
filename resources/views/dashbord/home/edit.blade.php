@extends('dashbord.globale')

@section('content')
    <div class="container-xl px-4 mt-4">

        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">edit home</div>
            <div class="card-body">
                <form action="{{ route('home.update', $home->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Address</label>
                            <input class="form-control" id="adresse" name="adresse" type="text"
                            value="{{ $home->adresse }}"  required>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">City</label>
                            <input class="form-control" id="ville" name="ville" type="text"
                            value="{{ $home->ville }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Number of  place</label>
                            <input class="form-control" id="nb_place" name="nb_place" type="number"
                            value="{{ $home->nb_place }}" required>
                        </div>
                        <div class="col-md-6">
                        <label class="small mb-1" for="inputOrgName">Number of Bath</label>
                        <input class="form-control" id="bath" name="bath" type="number"
                        value="{{ $home->bath }}" required>
                        </div>

                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Price $</label>
                            <input class="form-control" id="prix" name="prix" type="number"
                            value="{{ $home->prix }}" required>
                            
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="num_tel">Phone Number</label>
                            <input class="form-control" id="num_tel" name="num_tel" type="text"
                            value="{{ $home->num_tel }}" pattern="\d{8}" title="Enter exactly 8 digits" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputBirthday">Description</label>
                            <input class="form-control" id="description" name="description" type="text"
                            value="{{ $home->description }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Hotel Categories</label>
                            <select class="form-select" id="category_id" name="category_id" aria-label="Default select example" required>
                                <option value="" disabled {{ old('category_id', $selectedCategory ?? '') == '' ? 'selected' : '' }}>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $selectedCategory ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>


    </div>
@endsection
