@extends('client.globale')


@section('content')
@if (session('success'))
    <div id="successAlert" class="alert alert-success fade show" role="alert" style="max-width: 400px; margin: 0 auto;">
        {{ session('success') }}
    </div>

    <script>
        // Ferme l'alerte après 5 secondes
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) {
                const bootstrapAlert = new bootstrap.Alert(alert);
                bootstrapAlert.close();
            }
        }, 5000); 
    </script>
    @endif
    @if (session('error'))
    <div id="errorAlert" class="alert alert-danger fade show" role="alert" style="max-width: 400px; margin: 0 auto;">
        {{ session('error') }}
    </div>

    <script>
        // Ferme l'alerte après 3 secondes
        setTimeout(() => {
            const alert = document.getElementById('errorAlert');
            if (alert) {
                const bootstrapAlert = new bootstrap.Alert(alert);
                bootstrapAlert.close();
            }
        }, 5000); 
    </script>
@endif
    <main class="mt-5">
        <section class="container detail-properties">
            <div class="text-center mb-4">
                <h2>{{ $detail->description }}</h2>
                <i class="uil uil-map-marker text-secondary"></i><span>{{ $detail->ville }},{{ $detail->adresse }}</span>
            </div>
            <div class="row mb-4">
                @foreach ($image->take(1) as $img)
    <div class="col-lg-6 mb-4">
        <img height="460" style="object-fit: cover" class="rounded w-100" src="{{ asset('images/' . $img->photos) }}" alt="">
    </div>
@endforeach


                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($image->slice(1) as $img)

                        <div class="col-lg-6 mb-4">
                            <img style="object-fit: cover" class="img-fluid h-100 w-100 rounded"
                            src="{{ asset('images/' . $img->photos) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card border-0 p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <h1>${{ $detail->prix }}</h1>
                            <div class="d-grid grid-custom">

                                <div class="col">
                                    <small class="text-secondary">Beds</small>
                                    <div class="d-flex align-items-center" style="column-gap: 0.4rem">
                                        <i class="uil uil-bed fs-2 fw-bold text-secondary"></i>
                                        <span class="fw-bold text-secondary">{{ $detail->nb_place }}</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <small class="text-secondary">Bath</small>
                                    <div class="d-flex align-items-center" style="column-gap: 0.4rem">
                                        <i class="uil uil-bath fs-2 fw-bold text-secondary"></i>
                                        <span class="fw-bold text-secondary">{{ $detail->bath }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-2">Description</h3>
                        <p class="mb-5 text-secondary">
aaaaaa                        </p>
                        <form action="{{ route('reserver', $detail->id) }}" method="post">
                          @csrf
                        <h4 class="mb-2">Pour reserver</h4>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">date_deb</label>
                                <input class="form-control" id="date_deb" name="date_deb" type="date" placeholder="Enter date_deb" min="" required>

                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">date_fin</label>
                                <input class="form-control" id="date_fin" type="date" name="date_fin" placeholder="Enter date_fin" min="" required>

                            </div>
                            <script>
                                const dateDeb = document.getElementById('date_deb');
                                const dateFin = document.getElementById('date_fin');
                            
                                // Met à jour la date minimale de date_deb pour qu'elle soit aujourd'hui
                                const today = new Date().toISOString().split('T')[0];
                                dateDeb.setAttribute('min', today);
                            
                                // Met à jour la date minimale de date_fin lorsque date_deb change
                                dateDeb.addEventListener('change', function() {
                                    dateFin.setAttribute('min', dateDeb.value); // date_fin doit être >= date_deb
                                    dateFin.value = ''; // Réinitialiser date_fin pour forcer l'utilisateur à sélectionner une nouvelle date
                                });
                            
                                // Validation pour s'assurer que les deux champs ne sont pas vides lors de la soumission du formulaire
                                document.querySelector('form').addEventListener('submit', function(event) {
                                    if (!dateDeb.value || !dateFin.value) {
                                        alert('Veuillez remplir les deux dates.');
                                        event.preventDefault(); // Empêche l'envoi du formulaire
                                    }
                                });
                            </script>
                            
                        </div>

                        <button class="w-75 p-3 text-center mx-auto btn btn-success" type="submit">reserver</button>
                      </form>

                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card py-5 h-100 border-0">
                        <div class="mx-auto text-center">
                            <img width="110" height="110" style="object-fit: cover" src="/frontend_client/assets/images/phone.png"
                                class="mb-3 rounded-circle d-block mx-auto border border-warning" alt="">
                            <h5 class="mb-3">Pour Contacter</h5>
                            <hr>
                            <ul class="list-unstyled mb-5">

                                <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                                    <span class="fw-light">Mobile : </span> {{ $detail->num_tel }}
                                </li>

                                <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                                    <span class="fw-light">Email : </span>agent@example.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
