   <x-headLink />

   <div class="container-xxl py-5 bg-dark hero-header mb-5">
       <div class="container text-center my-5 pt-5 pb-4">
           <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
           <nav aria-label="breadcrumb">
               <ol class="breadcrumb justify-content-center text-uppercase">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item"><a href="#">Pages</a></li>
                   <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
               </ol>
           </nav>
       </div>
   </div>
   </div>
   <!-- Navbar & Hero End -->


   <!-- Menu Start -->
   <div class="container-xxl py-5">
       <div class="container">
           <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
               <h1 class="mb-5">Booking</h1>
           </div>
           <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="tab-content">
                   <div id="tab-1" class="tab-pane fade show gap-3 active">
                       @foreach ($booking as $request)
                           <div class="card text-start rounded-3 w-100">
                               <h5 class="card-header bg-primary text-light">{{ $loop->iteration }}- Name:
                                   {{ $request->name }}</h5>
                               <div class="card-body">
                                   <h5 class="card-title">Email: {{ $request->email }}</h5>
                                   <h5 class="card-text">Description: {{ $request->request }}</h5>
                                   <h5 class="card-title text-start">Number Of People: {{ $request->people }}</h5>
                                   <h5 class="card-title text-start">{{ $request->date }}</h5>
                                   <form action="{{ route('removerequest', ['id' => $request->id]) }}" method="post">
                                       @csrf
                                       <button name="addbtn" type="submit" class="btn btn-danger"
                                           >Remove</button>
                                   </form>
                               </div>
                               <div class="card-footer bg-primary text-light text-start">
                                   {{ $request->created_at->diffForHumans() }}</div>
                           </div>

                           <hr>
                       @endforeach

                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Menu End -->


   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
       <div class="container py-5">
           <div class="row g-5">

               <div class="col-lg-3 col-md-6">
                   <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                   <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>120 Street, Nobel, Erbil, Iraq</p>
                   <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+964 123 4567</p>
                   <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                   <div class="d-flex pt-2">
                       <a class="btn btn-outline-light btn-social" href="https://twitter.com/i/flow/login"><i
                               class="fab fa-twitter"></i></a>
                       <a class="btn btn-outline-light btn-social" href="https://facebook.com"><i
                               class="fab fa-facebook-f"></i></a>
                       <a class="btn btn-outline-light btn-social" href="https://youtube.com"><i
                               class="fab fa-youtube"></i></a>
                       <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/"><i
                               class="fab fa-linkedin-in"></i></a>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6">
                   <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                   <h5 class="text-light fw-normal">Monday - Saturday</h5>
                   <p>09AM - 09PM</p>
                   <h5 class="text-light fw-normal">Sunday</h5>
                   <p>10AM - 08PM</p>
               </div>
               <div class="col-lg-3 col-md-6">
                   <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Setting</h4>
                   <a class="btn btn-link" href=""> Super user</a>
                   <a class="btn btn-link" href=""> BackUp</a>
                   <a class="btn btn-link" href="security.html">Security</a>
                   <a class="btn btn-link" href="login.html">Logout</a>
               </div>
           </div>
       </div>

   </div>
   <!-- Footer End -->


   <!-- Back to Top -->
   <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
   </div>

   <x-fotter />

   </body>

   </html>
