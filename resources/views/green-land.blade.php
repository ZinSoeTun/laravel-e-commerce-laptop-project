@extends('layout')
@section('title', 'Green Land Home Page')
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" type="image/x-icon">
{{-- jquery link --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
@section('content')
    <!-- ======= Hero Carousel Images ======= -->
    <div id="welcome" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image event/image 1.jpg') }}" style="height: 500px; margin-top:88px" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image event/image 2.jpg') }}" style="height: 500px; margin-top:88px"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image event/image 3.jpg') }}" style="height: 500px; margin-top:88px"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#welcome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#welcome" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- ======= Hero Section ======= -->
     {{-- success message --}}
     @if (session('success'))
     <div style=" margin-top:90px" class="text-success">
         <div class="alert alert-primary bg-success text-center alert-dismissible fade show" role="alert">
             <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     </div>
     @endif
    <section id="home" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <!-- ======= Hero Text ======= -->
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 class="text-primary" data-aos="fade-up">Welcome from Green Land </h2>
                    <p class="text-primary"data-aos="fade-up" data-aos-delay="100">Our company is a largest compant in
                        Myanmar and second largest company in Europe.We offer different kinds of laptops.You can believe our
                        laptops quality.</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="https://unsplash.com/s/photos/laptop-computer" class="btn-book-a-table">Learn More</a>
                        <a href="https://www.youtube.com/watch?v=KfU5B8deA4Y"
                            class="glightbox btn-watch-video d-flex align-items-center text-success"><i
                                class="bi bi-play-circle text-success"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <!-- ======= Hero Carousel Images ======= -->
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('images/Asus/ROG Mothership.png') }}" alt="carousel image" width="400"
                        height="400">
                </div>
            </div>
    </section>
    <!-- End Hero Section -->

    <!-- ======= Products Section ======= -->
    <section id="product" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2 style="color: blue">Products</h2>
                <p style="color: blue">Check Our <span>Products List</span></p>
            </div>

            <ul class="nav nav-tabs d-flex justify-content-center mb-4" data-aos="fade-up" data-aos-delay="200"
                style="border-radius:10px">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#acer">
                        <h4>Acer</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#asus">
                        <h4>Asus</h4>
                    </a><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#dell">
                        <h4>Dell</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#lenovo">
                        <h4>Lenovo</h4>
                    </a>
                </li><!-- End tab nav item -->


                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ms">
                        <h4>Microsoft Surface</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#msi">
                        <h4>MSI</h4>
                    </a>
                </li><!-- End tab nav item -->
            </ul>

            <!-- ======= Acer======= -->
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="acer">
                    <div class="text-center">
                        <h2 class="text-success"> Brand</h2>
                        <h1 class="text-info">Acer</h1>
                    </div>
                    <div class="d-flex flex-wrap">
                        @foreach ($productData as $product)
                            @if ($product->category_id == 1)
                                <div class="rounded-4 text-center mx-auto m-4">
                                    {{-- product image --}}
                                            <a href="{{ route('choice.products', $product->id) }}"
                                                title="Click Me To Add To Your Cart!">
                                                <div class="text-center my-3"
                                                    style=" height: 150px; background-color: white">
                                                    <img src="{{ asset('storage/product/' . $product->image) }}"
                                                        alt="image" width="150" height="150">
                                                </div>
                                            </a>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                    <h6 class="fs-5"> Name - {{ $product->name }}</h6>
                                    <p class="fs-5"> Series - {{ $product->series }}</p>
                                    <p class="fs-5"> Price - <i class='fas fa-dollar-sign'></i> {{ $product->price }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ======= Asus======= -->
            <div class="tab-content mx-auto" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade" id="asus">
                    <div class="text-center">
                        <h2 class="text-success"> Brand</h2>
                        <h1 class="text-info">Asus</h1>
                    </div>
                    <div class=" row d-flex flex-wrap">
                        @foreach ($productData as $product)
                            @if ($product->category_id == 2)
                                <div class="col-12 col-md-6 col-lg-4 rounded-4 text-center mx-auto" style="margin: 30px">
                                    {{-- product image --}}
                                            <a href="{{ route('choice.products', $product->id) }}"
                                                title="Click Me To Add To Your Cart!">
                                                <div class=" text-center my-3"
                                                    style=" height: 150px">
                                                    <img src="{{ asset('storage/product/' . $product->image) }}"
                                                        alt="image" width="150" height="150">
                                                </div>
                                            </a>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                    <h6 class="fs-5">Name - {{ $product->name }}</h6>
                                    <p class="fs-5"> Series- {{ $product->series}}</p>
                                    <p class="fs-5"> Price - <i class='fas fa-dollar-sign'></i> {{ $product->price }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- ======= Dell ======= -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            <div class="tab-pane fade" id="dell">
                <div class="text-center">
                    <h2 class="text-success">Brand</h2>
                    <h1 class="text-info">Dell</h1>
                </div>
                <div class=" row d-flex flex-wrap">
                    @foreach ($productData as $product)
                        @if ($product->category_id == 3)
                            <div class="col-12 col-md-6 col-lg-4 rounded-4 text-center  mx-auto mt-5">
                                {{-- product image --}}
                                        <a href="{{ route('choice.products', $product->id) }}"
                                            title="Click Me To Add To Your Cart!">
                                            <div class=" text-center my-3"
                                                style=" height: 150px">
                                                <img src="{{ asset('storage/product/' . $product->image) }}"
                                                    alt="image" width="150" height="150">
                                            </div>
                                        </a>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                <i class="fa-regular fa-star text-warning"></i>
                                <h6 class="fs-5"> Name - {{ $product->name }}</h6>
                                <p class="fs-5"> Series - {{ $product->series }}</p>
                                <p class="fs-5"> Price - <i class='fas fa-dollar-sign'></i> {{ $product->price }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ======= lenovo======= -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            <div class="tab-pane fade" id="lenovo">
                <div class="text-center">
                    <h2 class="text-success"> Brand</h2>
                    <h1 class="text-info">Lenovo</h1>
                </div>
                <div class=" row d-flex flex-wrap">
                    @foreach ($productData as $product)
                        @if ($product->category_id == 4)
                            <div class=" col-12 col-md-6 col-lg-4 rounded-4 text-center mx-auto mt-5">
                                {{-- product image --}}
                                        <a href="{{ route('choice.products', $product->id) }}"
                                            title="Click Me To Add To Your Cart!">
                                            <div class=" text-center my-3"
                                                style=" height: 150px">
                                                <img src="{{ asset('storage/product/' . $product->image) }}"
                                                    alt="image" width="150" height="150">
                                            </div>
                                        </a>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                <i class="fa-regular fa-star text-warning"></i>
                                <h6 class="fs-5"> Name - {{ $product->name }}</h6>
                                <p class="fs-5"> Series - {{ $product->series }}</p>
                                <p class="fs-5"> Price - <i class='fas fa-dollar-sign'></i> {{ $product->price }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- =======Microsoft surface======= -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            <div class="tab-pane fade" id="ms">
                <div class="text-center">
                    <h2 class="text-success"> Brand</h2>
                    <h1 class="text-info">Microsoft surface</h1>
                </div>
                <div class="row d-flex flex-wrap">
                    @foreach ($productData as $product)
                        @if ($product->category_id == 5)
                            <div class=" col-12 col-md-6 rounded-4 text-center mx-auto mt-5">
                                {{-- product image --}}
                                        <a href="{{ route('choice.products', $product->id) }}"
                                            title="Click Me To Add To Your Cart!">
                                            <div class=" text-center my-3"
                                                style=" height: 150px">
                                                <img src="{{ asset('storage/product/' . $product->image) }}"
                                                    alt="image" width="150" height="150">
                                            </div>
                                        </a>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                <i class="fa-regular fa-star text-warning"></i>
                                <h6 class="fs-5"> Name - {{ $product->name }}</h6>
                                <p class="fs-5"> Series - {{ $product->series }}</p>
                                <p class="fs-5"> Price - <i class='fas fa-dollar-sign'></i> {{ $product->price }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ===light======= -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            <div class="tab-pane fade" id="msi">
                <div class="text-center">
                    <h2 class="text-success">Brand</h2>
                    <h1 class="text-info">MSI</h1>
                </div>
                <div class="d-flex flex-wrap">
                    @foreach ($productData as $product)
                        @if ($product->category_id == 6)
                            <div class="rounded-4 text-center mx-auto mt-5">
                                {{-- product image --}}
                                        <a href="{{ route('choice.products', $product->id) }}"
                                            title="Click Me To Add To Your Cart!">
                                            <div class=" text-center my-3"
                                                style=" height: 150px">
                                                <img src="{{ asset('storage/product/' . $product->image) }}"
                                                    alt="image" width="150" height="150">
                                            </div>
                                        </a>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                <i class="fa-regular fa-star text-warning"></i>
                                <h6 class="fs-5"> Name - {{ $product->name }}</h6>
                                <p class="fs-5"> Series - {{ $product->series }}</p>
                                <p class="fs-5"> Price - <i class='fas fa-dollar-sign'></i> {{ $product->price }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-light">About Us</h2>
                <p class="text-light">Learn More <span>About Company</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img"
                    style="background-image: url('{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}') ;
                         background-position: center;
                          background-size: contain;
                          background-repeat: no-repeat"
                    data-aos="fade-up" data-aos-delay="150">
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <div>
                            <p class="fs-1 fst-italic text-dark text-center">Green Land</p>
                        </div>
                        <p class="fs-5 fst-italic text-light">
                           <strong class="fs-5 text-dark">Green Land</strong> is a largest compant in Myanmar and second largest company in Europe.We offer different kinds of
                            laptops.You can believe our laptops quality.
                        </p>
                        <div class="position-relative mt-4">
                            <img src="{{ asset('image event/image 1.jpg') }}" class="img-fluid" alt="">
                            <a href="https://www.youtube.com/watch?v=QxAqV16mdoE"
                                class="glightbox play-btn text-success"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->


    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div style="border-radius: 6px" class="why-box bg-success">
                        <h3>Why Choose Us?</h3>
                        <p>
                            Because we have a strong global presence.
                            It has very strong customer services and quick delivery system.
                            Lptop products prices are resonable and it has always promotion and give presents.
                            Great warranty and reparing services are maing point for every customers.
                            You can easily order different variety of sports products from the world.
                        <div class="text-center">
                            <a href="https://unsplash.com/s/photos/laptop" class="more-btn">More Laptop<i
                                    class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="row gy-4">

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box bg-info d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-clipboard-data"></i>
                                <h4>Strong Financial Performance</h4>
                                <p>Green Land have strong financial performance. Globally,the financial performance
                                    of Green Land has been strong.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box bg-info d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-gem"></i>
                                <h4>Our Promise</h4>
                                <p>Our team lives by our people promise: Be your best self. Make a difference. Have
                                    fun. We have experts service technician and they are waiting for your problems.
                                </p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box bg-info d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-inboxes"></i>
                                <h4>Our Mission</h4>
                                <p>Our principles of cooperation, respect, responsibility, transparency,
                                    and innovation, our's main focus is the success of its business
                                    partners, employees, and consumers.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-header text-secondary">
                <h2 style="color: blue">Testimonials</h2>
                <p style="color: blue">What Are They <span>Saying About Us</span></p>
            </div>

            <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left text-success"></i>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.
                                            <i class="bi bi-quote quote-icon-right text-success"></i>
                                        </p>
                                        <h3>Saul Goodman</h3>
                                        <h4>Ceo &amp; Founder</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('user/images/profile/male1.jpg') }}"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left text-success"></i>
                                            Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua
                                            noster fugiat irure amet legam anim culpa.
                                            <i class="bi bi-quote quote-icon-right text-success"></i>
                                        </p>
                                        <h3>Sara Wilsson</h3>
                                        <h4>Designer</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('user/images/profile/female1.jpg') }}"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left text-success"></i>
                                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem veniam duis minim tempor labore quem eram duis noster aute amet eram
                                            fore quis sint minim.
                                            <i class="bi bi-quote quote-icon-right text-success"></i>
                                        </p>
                                        <h3>Jena Karlis</h3>
                                        <h4>Store Owner</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('user/images/profile/female2.jpg') }}"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left text-success"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam esse veniam culpa fore nisi cillum quid.
                                            <i class="bi bi-quote quote-icon-right text-success"></i>
                                        </p>
                                        <h3>John Larson</h3>
                                        <h4>Entrepreneur</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('user/images/profile/male2.jpg') }}"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2 class="text-primary">gallery</h2>
                <p class="text-primary">Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Acer/Predator Helios NEO 16.png')}}"><img src="{{asset('images/Acer/Predator Helios NEO 16.png')}}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Acer/Predator Triton 17X.png')}}"><img src="{{asset('images/Acer/Predator Triton 17X.png')}}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Asus/ASUS TUF Gaming F17.png')}}"><img
                                src="{{asset('images/Asus/ASUS TUF Gaming F17.png')}}"class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Asus/ROG Mothership.png')}}"><img src="{{asset('images/Asus/ROG Mothership.png')}}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Dell/Alienware m16.png')}}"><img
                                src="{{asset('images/Dell/Alienware m16.png')}}"class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/MSI/Stealth 16 Mercedes AMG A13VG.png')}}"><img src="{{asset('images/MSI/Stealth 16 Mercedes AMG A13VG.png')}}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Lenovo/Legion Slim 4060.png')}}"><img src="{{asset('images/Lenovo/Legion Slim 4060.png')}}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{asset('images/Microsoft Surface/Surface Laptop Go 3.png')}}"><img src="{{asset('images/Microsoft Surface/Surface Laptop Go 3.png')}}"
                                class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Gallery Section -->
    </section>
    <!-- End Testimonials Section -->


    <!-- ======= Event Section ======= -->
    <!-- events start -->
    <section class="mt-4" id="event">
        <div class="container">
            <div class="row">
                <!-- events title -->
                <div class="col-12 text-center mb-2">
                    <h5 style="color: blue">Our Events</h5>
                    <h2 style="color: blue"> Share Your Moment With Green Land</h2>
                </div>
                <!-- events Carosel -->
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="height: 550px" src="{{ asset('images/event1.png') }}"
                                class="eventImage d-block w-100 img-fluid img-thumbnail" alt="eventImage 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">First Moment</h5>
                                <p class="text-light">Green Land Brand Showroom in Malaysia
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img style="height: 550px" src="{{ asset('images/event2.png') }}"
                                class="eventImage d-block w-100 img-fluid img-thumbnail" alt="eventImage 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Second Moment</h5>
                                <p class="text-light">Green Land branch shop in Europe
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img style="height: 550px"
                                src="{{ asset('images/event3.png') }}"
                                class="eventImage d-block w-100 img-fluid img-thumbnail" alt="eventImage 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Third Moment</h5>
                                <p class="text-light">Our Main office in Myanmar
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img style="height: 550px" src="{{ asset('images/event4.png') }}"
                                class="eventImage d-block w-100 img-fluid img-thumbnail" alt="eventImage 4">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Forth Moment</h5>
                                <p class="text-light">Green Land second branch office in USA
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- events end -->
    <!-- ======= End Event Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact</h2>
                <p>Need Help? <span>Contact Us</span></p>
            </div>

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-map flex-shrink-0 bg-success"></i>
                        <div>
                            <h3>Our Address</h3>
                            <p>157 William St, New York,<br>
                                 NY 10038, United States</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-envelope flex-shrink-0 bg-success"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>greenLand@gmail.com</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-telephone flex-shrink-0 bg-success"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-share flex-shrink-0 bg-success"></i>
                        <div>
                            <h3>Opening Hours</h3>
                            <div><strong>Mon-Sat:</strong> 9AM - 8PM;
                                <strong>Sunday:</strong> Closed
                            </div>
                        </div>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <!--Start Contact Form -->
            <div class="form-control mt-4" >
                <form action="{{route('contact')}}" method="post" role="form" class=" p-3 p-md-4">
                    @csrf
                    {{-- name --}}
                    <div class="row mt-4">
                        <div class="col-xl-6">
                            <input type="text" name="name" class="form-control  @error('name')is-invalid @enderror" id="name"
                                placeholder="your name">
                                @error('name')
                                <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- email --}}
                        <div class="col-xl-6">
                            <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" id="email"
                                placeholder="your email">
                                @error('email')
                                <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- phone number --}}
                    <div class="mt-4">
                        <input type="text" class="form-control" name="phone" id="subject"
                            placeholder="your phone number">
                    </div>
                    {{-- message --}}
                    <div class="mt-4">
                        <textarea class="form-control  @error('message')is-invalid @enderror" name="message" rows="5" placeholder="your message" required>
                        </textarea>
                        @error('message')
                        <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="text-center mt-4"><button class="btn btn-success text white" type="submit">Send
                            Message</button></div>
                </form>
            </div>
            <!--End Contact Form -->
        </div>
    </section>
    <!-- End Contact Section -->
      <!-- Start Google Maps -->
      <div class="mb-3">
        <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- End Google Maps -->

    <!-- ======= Cart Button start ======= -->
@section('cartBtn')
    <a class="btn btn-success text-bg-success position-relative" href="{{ route('cart') }}"><i
            class="fa-solid fa-cart-plus me-2"></i>Cart
        @if (count($cartData) != 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ count($cartData) }}

            </span>
        @endif
    </a>
@endsection
<!-- ======= Cart button end======= -->
