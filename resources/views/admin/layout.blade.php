<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href=" {{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href=" {{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href=" {{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href=" {{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href=" {{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header bg-info fixed-top d-flex align-items-center">
        <!--  Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" alt="">
                <span class="d-none text-dark d-lg-block">Green Land</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <!--  Search Icon-->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown">
                    <!--  Notification Icon -->
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a>
                    <!-- End Notification Icon -->

                    <!-- End Notification DropDown Items -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">
                    <!-- Messages Icon -->
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>
                    <!-- End Messages Icon -->

                    <!-- Messages Dropdown Items -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul>
                    <!-- End Messages Dropdown Items -->

                </li>
                <!-- End Messages Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->



    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar bg-success">
        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- Dashboard Nav -->
            <li class="nav-item">
                <a class="admin.dashboard " href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid text-info"></i>
                    <span class="text-info">Dashboard</span>
                </a>
            </li>

            <!-- Category Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#category" data-bs-toggle="collapse" href="#">
                    <i class='fab fa-adversal'></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="category" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('category.page') }}">
                            <i class='fab fa-angrycreative'></i><span>Create Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.list') }}">
                            <i class='fas fa-clipboard-list'></i><span>Category List</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Product Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#product" data-bs-toggle="collapse" href="#">
                    <i class='fas fa-dice-d6'></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="product" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('product.page') }}">
                            <i class='fab fa-angrycreative'></i><span>Create Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.list') }}">
                            <i class='fas fa-clipboard-list'></i><span>Product List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Order Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#order" data-bs-toggle="collapse" href="#">
                    <i class="fa-brands fa-squarespace"></i><span>Order</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="order" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('order.list') }}">
                            <i class="fa-brands fa-squarespace"></i><span>Order List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- User Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#account" data-bs-toggle="collapse" href="#">
                    <i class='fas fa-users'></i><span>Account</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="account" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.list') }}">
                            <i class='fab fa-angrycreative'></i><span>User List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.list') }}">
                            <i class='fas fa-clipboard-list'></i><span>Admin List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Contact Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#contact" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-address-card"></i><span>Contact</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="contact" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('contact.list') }}">
                            <i class="fa-solid fa-address-card"></i><span>Contact List</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </aside>
    <!-- End Sidebar-->

    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer mt-5">
        <div style="text-align: center">
            <img style="width: 150px; height: 150px"
                src="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" alt="">
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>GREEN LAND</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <strong class="text-success"><span>Green Land</span></strong>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Arrow key -->
    <a href="#" class="back-to-top d-flex align-items-center bg-success justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src=" {{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src=" {{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src=" {{ asset('admin/vendor/chart.js/chart.min.js') }}"></script>
    <script src=" {{ asset('admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src=" {{ asset('admin/vendor/quill/quill.min.js') }}  "></script>
    <script src=" {{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src=" {{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src=" {{ asset('admin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
