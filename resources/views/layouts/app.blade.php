<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="{{ $keywords ?? '' }}">
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#008276">
        <title> Admin Dashboard </title>
        <meta name="robots" content="index,follow">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.1.0/styles/overlayscrollbars.min.css" integrity="sha256-LWLZPJ7X1jJLI5OG5695qDemW1qQ7lNdbTfQ64ylbUY=" crossorigin="anonymous">
        <!-- Include App Style Sheet -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <style>
            body{
                font-family: 'Source Sans Pro', sans-serif !important;
            }
        </style>
    </head>
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div id="app" class="app-wrapper" v-cloak>
            
               
                    <!--begin::Header-->
                    <nav class="app-header navbar navbar-expand bg-body">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <!--begin::Start Navbar Links-->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                                        <i class="bi bi-list"></i>
                                    </a>
                                </li>
                                {{-- <li class="nav-item d-none d-md-block">
                                    <a href="#" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item d-none d-md-block">
                                    <a href="#" class="nav-link">Contact</a>
                                </li> --}}
                            </ul>
                            <!--end::Start Navbar Links-->

                            <!--begin::End Navbar Links-->
                            <ul class="navbar-nav ms-auto">
                                <!--begin::Navbar Search-->
                                {{-- <li class="nav-item">
                                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                                        <i class="bi bi-search"></i>
                                    </a>
                                </li> --}}
                                <!--end::Navbar Search-->

                                <!--begin::Messages Dropdown Menu-->
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link" data-bs-toggle="dropdown" href="#">
                                        <i class="bi bi-chat-text"></i>
                                        <span class="navbar-badge badge text-bg-danger">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                        <a href="#" class="dropdown-item">
                                            <!--begin::Message-->
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('images/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 rounded-circle me-3">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3 class="dropdown-item-title">
                                                        Brad Diesel
                                                        <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                                    </h3>
                                                    <p class="fs-7">Call me whenever you can...</p>
                                                    <p class="fs-7 text-secondary">
                                                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                                    </p>
                                                </div>
                                            </div>
                                            <!--end::Message-->
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <!--begin::Message-->
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('images/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 rounded-circle me-3">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3 class="dropdown-item-title">
                                                        John Pierce
                                                        <span class="float-end fs-7 text-secondary">
                                                            <i class="bi bi-star-fill"></i>
                                                        </span>
                                                    </h3>
                                                    <p class="fs-7">I got your message bro</p>
                                                    <p class="fs-7 text-secondary">
                                                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                                    </p>
                                                </div>
                                            </div>
                                            <!--end::Message-->
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <!--begin::Message-->
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('images/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 rounded-circle me-3">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3 class="dropdown-item-title">
                                                        Nora Silvester
                                                        <span class="float-end fs-7 text-warning">
                                                            <i class="bi bi-star-fill"></i>
                                                        </span>
                                                    </h3>
                                                    <p class="fs-7">The subject goes here</p>
                                                    <p class="fs-7 text-secondary">
                                                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                                    </p>
                                                </div>
                                            </div>
                                            <!--end::Message-->
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                                    </div>
                                </li> --}}
                                <!--end::Messages Dropdown Menu-->

                                <!--begin::Notifications Dropdown Menu-->
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link" data-bs-toggle="dropdown" href="#">
                                        <i class="bi bi-bell-fill"></i>
                                        <span class="navbar-badge badge text-bg-warning">15</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="bi bi-envelope me-2"></i> 4 new messages
                                            <span class="float-end text-secondary fs-7">3 mins</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="bi bi-people-fill me-2"></i> 8 friend requests
                                            <span class="float-end text-secondary fs-7">12 hours</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                                            <span class="float-end text-secondary fs-7">2 days</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item dropdown-footer">
                                            See All Notifications
                                        </a>
                                    </div>
                                </li> --}}
                                <!--end::Notifications Dropdown Menu-->

                                <!--begin::User Menu Dropdown-->
                                <li class="nav-item dropdown user-menu">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="{{ asset('images/user2-160x160.jpg') }}" class="user-image rounded-circle shadow" alt="User Image">
                                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                        <!--begin::User Image-->
                                        <li class="user-header text-bg-primary">
                                            <img src="{{ asset('images/user2-160x160.jpg') }}" class="rounded-circle shadow" alt="User Image">

                                            <p>
                                                {{ Auth::user()->name }}
                                                <small> {{ Auth::user()->email }} </small>
                                            </p>
                                        </li>
                                        <!--end::User Image-->
                                        <!--begin::Menu Footer-->
                                        <li class="user-footer">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end">Sign out</a>
                                        </li>
                                        <!--end::Menu Footer-->
                                    </ul>
                                </li>
                                <!--end::User Menu Dropdown-->
                            </ul>
                            <!--end::End Navbar Links-->
                        </div>
                        <!--end::Container-->
                    </nav>
                    <!--end::Header-->
                    @include('layouts.navigation')
                    <!--begin::App Main-->
                    @yield('content')
                    <!--end::App Main-->
                    <!--begin::Footer-->
                    <footer class="app-footer">
                        <!--begin::To the end-->
                        <div class="float-end d-none d-sm-inline">Anything you want</div>
                        <!--end::To the end-->
                        <!--begin::Copyright-->
                        <strong>
                            Copyright &copy; 2025
                        </strong>
                        LDP - L DharmaPrakash
                        <!--end::Copyright-->
                    </footer>
                    <!--end::Footer-->
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="#" class="form-horizontal" id="confirmDeleteForm" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold"> Confirm Delete </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p> This Process is irreversible,Are you confirm to delete this </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal"> Cancel </button>
                                        <button type="submit" class="btn btn-danger"> Proceed </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  Delete Confirmation Modal -->
               
            
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.1.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-NRZchBuHZWSXldqrtAOeCZpucH/1n1ToJ3C8mSK95NU=" crossorigin="anonymous"></script>
        <script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('plugins/summernote/summernote-bs5.min.js') }}"></script>
        @if(Session::has('message'))
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded',function() {
                var content = {};
                content.message = '{!! Session::get("message") !!}';
                content.title = "{!! Session::get('title') !!}";
                state = "{!! Session::get('state') !!}";
                flashMessage(content,state);
            });
        </script>
        @endif
        @stack('scripts')
    </body>
</html>