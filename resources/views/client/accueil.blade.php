@extends('client.globale')

@section('content')
    <section class="hero" style="background-image: url('/frontend_client/assets/images/bg.jpg')">
        <div class="container">
            <div class="row text-center" style="padding-top: 270px">
                <h3 class="text-white">
                    <span class="fw-bold">Find</span> Your Next <br>
                    Dream <span class="fw-bold">Home</span>
                </h3>
            </div>
        </div>
    </section>
    <section class="container category" style="margin-bottom: 100px">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Homes</h3>
            
        </div>
        <hr>
        <div class="row">
            @if ($homeData->isEmpty())
                <h3>No homes available at the moment</h3>
            @else
                @foreach ($homeData as $home)
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm">
                            @if (empty($home['image']))
    <img height="310" style="object-fit: cover" src="{{ asset('images/vide.jpg') }}" class="card-img-top" alt="Aucune image disponible">
@else
    <img height="310" style="object-fit: cover" src="{{ asset('images/' . $home['image']) }}" class="card-img-top" >
@endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $home['category_name']}}</h5>
                                 <i class="uil uil-map-marker text-secondary"></i>
                                <span class="text-secondary">{{ $home['adresse'] }}</span>
                                <hr>
                                <div class="d-grid grid-custom">
                                    <div class="col">
                                        <small class="text-secondary">City</small>
                                        <div class="d-flex align-items-center" style="column-gap: 0.4rem">
                                            <i class="uil uil-image-resize-square fw-bold fs-2 text-secondary"></i>
                                            <span class="fw-bold text-secondary">{{ $home['ville'] }}</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <small class="text-secondary">Beds</small>
                                        <div class="d-flex align-items-center" style="column-gap: 0.4rem">
                                            <i class="uil uil-bed fs-2 fw-bold text-secondary"></i>
                                            <span class="fw-bold text-secondary">{{ $home['nb_place'] }}</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <small class="text-secondary">Bath</small>
                                        <div class="d-flex align-items-center" style="column-gap: 0.4rem">
                                            <i class="uil uil-bath fs-2 fw-bold text-secondary"></i>
                                            <span
                                                class="fw-bold text-secondary">{{ $home['bath'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-5">
                                <h1 style="width: 50%; font-size: 2vw" class="fw-bold mb-0">
                                    ${{ $home['prix'] }}
                                </h1>
                                <a href="{{ route('detail', $home['id']) }}"
                                style="right: 0; bottom: 0; border-radius: 0.4rem 0 0.4rem 0"
                                class="align-items-center border-0 p-3 px-5 position-absolute btn btn-primary d-inline-flex">View
                                Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
