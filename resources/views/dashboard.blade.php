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
<body>
    <div class="">
        <!-- Contact Info -->
        <div class="d-flex align-items-center gap-3 p-3" style="background-color:rgb(247, 231, 184);">
            <span><i class="fas fa-phone-alt"></i> Phone: +1234567890</span>
            <span><i class="fas fa-mobile-alt"></i> Cell: +0987654321</span>
            <span><i class="fas fa-envelope"></i> Email: info@college.com</span>
        </div>
                
        <!-- College Name & Logo -->
        <div class="text-center my-3">
            <img src="{{ asset('images/logo.jpg') }}" alt="College Logo" class="img-fluid" style="max-height: 80px;">
            <h2 class="mt-2">Welcome to College</h2>
        </div>
        
        <!-- Image Swipe (Carousel) -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('images/college1.jpg') }}" class="d-block w-100" alt="Slide 1">
                    <!-- <img src="public/images/college1.jpg" class="d-block w-100" alt="Slide 1"> -->
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/college2.jpg') }}" class="d-block w-100" alt="Slide 1">
                    <!-- <img src="public/images/college2.jpg" class="d-block w-100" alt="Slide 2"> -->
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/college3.jpg') }}" class="d-block w-100" alt="Slide 1">
                    <!-- <img src="public/images/college3.jpg" class="d-block w-100" alt="Slide 3"> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        
        <!-- Department Dropdown & Google Map -->
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="department" class="form-label">Select Department:</label>
                <select id="department" class="form-select">
                    <option value="cs">Computer Science</option>
                    <option value="ee">Electrical Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                </select>
            </div>
            <div class="col-md-6">
                <h5>College Address</h5>
                <p>123 College St, City, Country</p>
                <iframe 
                    src="https://www.google.com/maps/embed?..."
                    width="100%" height="200" style="border:0;" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
@endpush



