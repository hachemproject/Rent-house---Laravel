@extends('client.globale')

@section('content')
<main>
    <section
      class="hero-property mb-5"
      style="
        background-image: url('./assets/images/bg-alt.jpg');
        height: 50vh;
      "
    >
      <div class="container">
        <div class="row text-center" style="padding-top: 120px">
          <h3 class="text-white">Our Reservations</h3>
        </div>
      </div>
    </section>
    <section class="container category" style="margin-bottom: 100px">
      <h3 class="text-center">Your Reservations</h3>
      <p class="text-center">Your Reservations</p>
      <hr />

      <div class="row mt-5">
        @foreach ($details as $detail)
          <div class="col-lg-4 mb-4">
            <div class="card py-5 h-100 border-0">
              <div class="mx-auto text-center">
              
                  <span class="mb-1 d-block text-secondary">{{ $detail->home->category->nom }}</span>

                <i class="uil uil-map-marker text-secondary">
                  {{ $detail->home->ville ?? 'Non défini' }}
                </i>
                <hr />
                <ul class="list-unstyled mb-5">
                  <li class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Adresse : </span>{{ $detail->home->adresse }}
                  </li>
                  <li class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Mobile : </span>{{ $detail->home->num_tel}}
                  </li>
                  <li class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Start Date: </span>{{ $detail->date_deb }}
                  </li>
                  <li class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">End Date: </span>{{ $detail->date_fin }}
                  </li>
                  <li class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Prix : </span>{{ $detail->home->prix }} $
                  </li>
                </ul>
              </div>
              <a href="{{ route('detail', $detail->id) }}" class="btn btn-primary me-2 my-1">Reservation details</a>
              @if ($detail->canCancel)
                    <form action="{{ route('reservations.destroy', $detail->id) }}" method="POST" class="btn  me-2 my-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2 my-1">Cancel the reservation</button>
                    </form>
                @endif
         
            </div>
          </div>
        @endforeach
      </div>
    </section>
</main>
@endsection
