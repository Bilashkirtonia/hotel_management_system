<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel management system</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            height: 500px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ url('/') }}">Home</a>
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
    </div>
    <main>
        @yield('content')
    </main>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>