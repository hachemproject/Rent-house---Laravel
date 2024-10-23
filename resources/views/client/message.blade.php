@extends('client.globale')


@section('content')
    <main>
        <section class="hero-property mb-5"
            style="
        background-image: url('/frontend_client/assets/images/bg-alt.jpg');
        height: 50vh;
      ">
            <div class="container">
                <div class="row text-center" style="padding-top: 120px">
                    <h3 class="text-white">Contact</h3>
                </div>
            </div>
        </section>
        <section class="container" style="margin-bottom: 100px">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card p-3 border-0">
                        @if (session('message'))
    <div id="successAlert" class="alert alert-success fade show" role="alert" style="max-width: 400px; margin: 0 auto;">
        {{ session('message') }}
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
                        <h3 class="mb-4">Get In Touch</h3>
                        <form action="{{ route('ajoutmessage') }}" method="POST">   
                            @csrf

                         <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="tex" class="form-control bg-white border-secondary"
                                            style="height: 45px" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="col">
                                        <input type="tex" class="form-control bg-white border-secondary"
                                            style="height: 45px" id="email" name="email" placeholder="Email" required>
                                    </div>
                                  
                                        <div class="col">
                                            <input type="tex" class="form-control bg-white border-secondary"
                                                style="height: 45px" id="subject" name="subject" placeholder="subject" required>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col">
                                        <textarea id="message" name="message" class="form-control bg-white border-secondary" rows="10" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3 py-3 px-4" type="submit">Send</button>
                            
                        </form>
                        
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 p-3">
                      <h3 class="mb-4">Contact Details</h3>
                      <ul class="list-unstyled">
                        <li class="d-flex align-items-center" style="column-gap: 0.8rem">
                          <i class="uil uil-map-marker fs-3"></i><span class="text-secondary">Sfax</span>
                        </li>
                        <li class="d-flex align-items-center" style="column-gap: 0.8rem">
                          <i class="uil uil-map-marker fs-3"></i><span class="text-secondary">dreamhome@gmail.com</span>
                        </li>
                        <li class="d-flex align-items-center" style="column-gap: 0.8rem">
                          <i class="uil uil-map-marker fs-3"></i><span class="text-secondary">123-456-78</span>
                        </li>
                      </ul>
                      <span class="d-block text-secondary">Monday – Friday: 9 am – 5 pm</span>
                      <span class="text-secondary">Saturday: 9 am – 1pm</span>
                    </div>
                  </div>
            </div>
        </section>
    </main>
@endsection
