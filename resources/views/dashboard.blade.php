@extends('layouts.app')
@section('content')
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="">
        <!-- Contact Info -->
        <div class="d-flex align-items-center gap-3 p-4" style="background-color:rgb(103, 212, 216);">
            <span><i class="fas fa-phone-alt"></i> Phone: +1234567890</span>
            <span><i class="fas fa-mobile-alt"></i> Cell: +0987654321</span>
            <span><i class="fas fa-envelope"></i> Email: info@college.com</span>
        </div>
                
        <!-- College Name & Logo -->
        <div class="d-flex align-items-center justify-content-center my-3">
            <img src="{{ asset('images/logo.jpg') }}" alt="College Logo" class="img-fluid me-3" style="max-height: 80px;">
            <h2 class="mt-2">Pope John Paul II College of Education</h2>
        </div>
        
        <!-- Image Swipe (Carousel) -->
        <div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/college1.jpg') }}" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college2.jpg') }}" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college3.jpg') }}" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            <!-- Department Dropdown -->
            <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex justify-content-between align-items-center" style="width:200px;background-color: rgb(103, 212, 216);" type="button" id="departmentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="color:white;">Department</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="departmentDropdown">
                        <li><a class="dropdown-item" href="#">Computer Science</a></li>
                        <li><a class="dropdown-item" href="#">Electrical Engineering</a></li>
                        <li><a class="dropdown-item" href="#">Mechanical Engineering</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- College Address -->
        <div class="mt-4 bg-white p-4 shadow-sm">
            <div class="row">
                <div class="col-md-2  ms-4">
                    <h5>Address</h5>
                    <p>54, College St, <br> College Main Road,<br> Manjakuppam,<br>
                    Cuddalore,  Tamilnadu.</p>
                </div>
                <div class="col-md-8">
                    <iframe 
                        src="https://www.google.com/maps/embed?..."
                        width="100%" height="200" style="border:0;" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush



