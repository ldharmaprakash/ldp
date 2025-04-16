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
        <div class="d-flex align-items-center gap-3 p-3" style="background-color:rgb(93, 230, 212);">
            <span><i class="fas fa-phone-alt"></i> Phone: +1234567890</span>
            <span><i class="fas fa-mobile-alt"></i> Cell: +0987654321</span>
            <span><i class="fas fa-envelope"></i> Email: info@college.com</span>
        </div>
                
        <!-- College Name & Logo -->
        <div class="d-flex align-items-center justify-content-center  " style="width: 100%;">
            <img src="{{ asset('images/clglogo.png') }}" alt="College Logo" class="img-fluid me-3" style="max-height: 80px; width : 90%;">
           

        </div>
        
        <!-- Image Swipe (Carousel) -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/college1.jpg') }}" class="d-block w-100 " alt="Slide 1" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college2.jpg') }}" class="d-block w-100" alt="Slide 2"style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college3.jpg') }}" class="d-block w-100" alt="Slide 3"style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college4.jpg') }}" class="d-block w-100" alt="Slide 1"style="max-height: 250px;">             
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college5.jpg') }}" class="d-block w-100" alt="Slide 2"style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college6.jpg') }}" class="d-block w-100" alt="Slide 3"style="max-height: 250px;">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('images/college7.jpg') }}" class="d-block w-100" alt="Slide 1"style="max-height: 250px;">              
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college8.jpg') }}" class="d-block w-100" alt="Slide 2"style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college9.jpg') }}" class="d-block w-100" alt="Slide 3"style="max-height: 250px;">
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
                        <li><a class="dropdown-item" >Computer Science</a></li>
                        <li><a class="dropdown-item" >Electrical Engineering</a></li>
                        <li><a class="dropdown-item" >Mechanical Engineering</a></li>
                    </ul>
                    <span for="department" style="color:white;">Department</span>
                <select id="department" name="department" class="form-select">
                    @foreach(\App\Models\Student::select('department')->distinct()->get() as $dept)
                        <option value="{{ $dept->department }}">{{ $dept->department }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        
        <!-- College Address -->
        <div class="mt-4 bg-white p-4 shadow-sm">
            <div class="row">
                <div class="col-md-2  ms-4">
                    <h5>Address</h5>
                    <p>54, College St, <br> College Main Road,<br> Kumarapuram,<br>
                    Cuddalore,  Tamilnadu.</p>
                </div>
                <div class="col-md-8">
                    <iframe 
                        src="https://www.google.com/maps/embed?..."
                        width="120%" height="200" style="border:0;" allowfullscreen>
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
@endpush



