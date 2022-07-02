<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel management system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            height: 500px;
            object-fit: cover;
        }
    </style>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                  </li> 
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ url('about') }}">About</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                  </li>
                  @if (Session::has('customerlogin'))
                  
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ url('logout') }}">logout</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link btn" href="{{ url('testimonial') }}">Add testimonial</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link btn btn-info" href="{{ url('booking') }}">Booking</a>
                  </li>
                  
                  @else
                  
                    <li class="nav-item ">
                      <a class="nav-link" href="{{ url('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('register') }}">Register</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link btn btn-info" href="{{ url('login') }}">Booking</a>
                    </li>                  
                  @endif         
                   
                </ul>
              </div>
            </div>
          </nav>


          {{-- slider --}}

          <div style="height: " id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-inner height-50"> 
              @foreach ($banner as $index => $banner)
              <div class="carousel-item @if ($index==0) active @endif ">
                <img src="banner/{{$banner->banner_src }}" class="d-block w-100" alt="...">
              </div>
              @endforeach              
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            
            
          </div>


          <div class="container my-3">
            <h2 class="text-center border-bottom">services</h2>

           @foreach ( $service as $service)
           <div class="row mt-4 border-bottom">
            <div class="col-md-4">
                <img src="{{ 'service/'.$service->photo}}" class="img-thumbnail" alt="image">
            </div>
            <div class="col-md-8">
                <h3>{{ $service->title }}</h3>
                <p>
                  {{ $service->small_desc }}
                </p>
                <a href="{{ url('service/'.$service->id) }}" class="btn btn-success">Read more</a>
            </div>
        </div>
           @endforeach

          </div>
 


    {{-- Gallery --}}
     {{-- <div class="container my-5">
        <div class="row">
             @foreach ($roomtype as $roomtype)
             <div class="col-sm-3 my-3">
               <div class="card">
                  <div class="card-body">
                    <p>{{ $roomtype->title  }}</p>
                    @foreach ($roomtype->roomtypeimage as $img)
                      <img src="{{ asset('storage/app/'.$img->img_src) }}" alt="">

                    @endforeach
                  </div>
                </div>
              </div>
             @endforeach
            </div>
        </div> --}}

        <div style="height: " id="testimanials" class="carousel slide mt-5 bg-dark text-white py-4" data-bs-ride="carousel">
          <div class="carousel-inner height-50">
            @foreach ($testimonial as $index => $testimonial)
              <div class="carousel-item @if ($index==0) active @endif">
                <figure class="text-center">
                  <blockquote class="blockquote">
                    <p>
                      {{ $testimonial->testi_desc }}
                    </p>
                  </blockquote>
                  <figcaption class="blockquote-footer">
                   good
                  </figcaption>
                </figure>
              </div>
            @endforeach
            
      
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#testimanials" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#testimanials" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>










<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>