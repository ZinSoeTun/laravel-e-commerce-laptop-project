<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('csrf')
    <!-- Favicons -->
 <link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Start Header -->
    <header id="header" class="header bg-info fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <!-- Logo and company name -->
            <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" class="me-3" alt="" width="100">
                <h1><span class="text-success"><i>Green Land</i></span></h1>
            </a>
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/#welcome">Welcome</a></li>
                    <li><a href="/#home">Home</a></li>
                    <li><a href="/#product">Product</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#event">Events</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown"><a href="#"><span>Account</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @if (!Auth::user())
                                <li><a href="{{ route('register') }}">Register<i class="fa-solid fa-user-plus"></i></a>
                                </li>
                                <li><a href="{{ route('login') }}">Log In<i class="fa-solid fa-user-check"></i></a></li>
                            @else
                                <li><a href="{{ route('profile') }}">Account Profile<i
                                            class="fa-solid fa-user-gear"></i></a></li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <li><a href="">
                                            <input style="border-radius: 4px; color:white" class=" btn btn-success"
                                                type="submit" value="Log Out"><i
                                                class="fa-solid fa-right-from-bracket"></i>
                                        </a>
                                    </li>
                                </form>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .navbar -->
            @if (Auth::user())
                @if (Auth::user()->role == 'admin')
                    <a class="btn-book-a-table text-bg-success" href="{{route('admin.dashboard')}}"><i
                            class="fas fa-address-card me-2"></i>
                        Admin</a>
                @else
                @yield('cartBtn')
                @endif
            @endif
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->


     <!-- ======= Hero Carousel Images ======= -->
 <div id="home" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('user/images/Events/My Image 4.png') }}" style="height: 500px; margin-top:91px"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/images/Events/My Image 3.png') }}" style="height: 500px; margin-top:91px"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/images/Events/My Image 2.png') }}" style="height: 500px; margin-top:91px"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/images/Events/My Image 1.png') }}" style="height: 500px; margin-top:91px"
                class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#home" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            AungMyaTherSan Street <br>
                            Mandalay, Myanmar<br>
                        </p>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact Us</h4>
                        <p>
                            <strong>Phone:</strong> +95 972345613<br>
                            <strong>Email:</strong> greenLand@gmail.com<br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 9AM</strong> - 8PM<br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter text-primary"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook text-primary"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram text-danger"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin text-primary"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="linkedin text-danger"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div style="text-align: center">
                <img style="width: 150px; height: 150px" src="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}"
                    alt="">
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>GREEN LAND</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by GREEN LAND
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <!-- Scroll Up Arrow -->
    <a href="#" class="bg-success scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Preloader -->
    <div id="preloader"></div>
</body>
    <!-- Vendor JS Files -->
    <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('user/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user/vendor/php-email-form/validate.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('user/js/main.js') }}"></script>
    @yield('jqueryCode')
</html>
















