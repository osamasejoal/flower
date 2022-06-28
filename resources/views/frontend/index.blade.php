@extends('frontend.layouts.master')

@section('main-content')
    <section id="home" class="intro-section">
        <div class="container">
            <div class="row align-items-center text-white">
                <!-- START THE CONTENT FOR THE INTRO  -->
                <div class="col-md-6 intros text-start">
                    <h1 class="display-2">
                        <span class="display-2--intro">{{ $banner->title }}</span>
                        <span class="display-2--description lh-base">{{ $banner->description }}</span>
                    </h1>
                    {{-- <button type="button" class="rounded-pill btn-rounded">Get in Touch
          <span><i class="fas fa-arrow-right"></i></span>
        </button> --}}
                    <a href="#contact" class="rounded-pill btn-rounded" style="width:fit-content;text-decoration:none;">Get
                        in Touch
                        <span><i class="fas fa-arrow-right d-block text-center"></i></span>
                    </a>
                </div>
                <!-- START THE CONTENT FOR THE VIDEO -->
                <div class="col-md-6 intros text-end">
                    <div class="video-box">
                        <img src="{{ asset('frontend/images') }}/arts/intro-section-illustration.png"
                            alt="video illutration" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////
                                                     START SECTION 3 - THE CAMPANIES SECTION
                        ////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <section id="campanies" class="campanies {{ $tbcs->isEmpty() ? 'd-none' : '' }}">
        <div class="container">
            <div class="row text-center">
                <h4 class="fw-bold lead mb-3">Trusted by campanies like</h4>
                <div class="heading-line mb-5"></div>
            </div>
        </div>
        <!-- START THE CAMPANIES CONTENT  -->
        <div class="container">
            <div class="row justify-content-center">

                @foreach ($tbcs as $tbc)
                    <div class="col-md-4 col-lg-2">
                        <div class="campanies__logo-box shadow-sm">
                            <img src="{{ asset('backend/assets/images/tbc/' . $tbc->logo) }}" alt="Campany 1 logo"
                                title="{{ $tbc->name }}" class="img-fluid">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////
                                                 START SECTION 4 - THE SERVICES
                        ///////////////////////////////////////////////////////////////////////////////////////////////////-->
    <section id="services" class="services">
        <div class="container">
            <div class="row text-center">
                <h1 class="display-3 fw-bold">Our Services</h1>
                <div class="heading-line mb-1"></div>
            </div>
            <!-- START THE DESCRIPTION CONTENT  -->
            <div class="row pt-2 pb-2 mt-0 mb-3">
                <div class="col-md-6 border-right">
                    <div class="bg-white p-3">
                        <h2 class="fw-bold text-capitalize text-center">
                            Our Services Range From Initial Design To Deployment Anywhere Anytime
                        </h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 text-start">
                        <p class="fw-light">
                            Lorem ipsum dolor sit amet consectetur architecto magni,
                            dicta maxime laborum temporibus dolorem esse doloremque illo quas nisi enim molestias.
                            Tempore ducimus molestiae in dolore enim.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- START THE CONTENT FOR THE SERVICES  -->
        <div class="container">

            @foreach ($services as $service)
                <div class="row">

                    @if ($loop->iteration % 2 == 0)
                        {{-- Service Image --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-start">
                            <div class="services__pic">
                                <img src="{{ asset('backend/assets/images/service/' . $service->image) }}"
                                    alt="marketing illustration" class="img-fluid">
                            </div>
                        </div>

                        {{-- Service Content --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
                            <div class="services__content">

                                {{-- Service Icon --}}
                                <div class="icon d-block {{ $service->icon }}"></div>

                                {{-- Service Name --}}
                                <h3 class="display-3--title mt-1">{{ $service->name }}</h3>

                                {{-- Service Short Description --}}
                                <p class="lh-lg">{{ $service->short_desc }}</p>

                                {{-- Service Details Button --}}
                                <form action="{{ route('service.page', $service->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="rounded-pill btn-rounded border-primary">Learn more
                                        <span><i class="fas fa-arrow-right"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Service Content --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
                            <div class="services__content">

                                {{-- Service Icon --}}
                                <div class="icon d-block {{ $service->icon }}"></div>

                                {{-- Service Name --}}
                                <h3 class="display-3--title mt-1">{{ $service->name }}</h3>

                                {{-- Service Short Description --}}
                                <p class="lh-lg">{{ $service->short_desc }}</p>

                                {{-- Service Details Button --}}
                                <form action="{{ route('service.page', $service->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="rounded-pill btn-rounded border-primary">Learn more
                                        <span><i class="fas fa-arrow-right"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Service Image --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-end">
                            <div class="services__pic">
                                <img src="{{ asset('backend/assets/images/service/' . $service->image) }}"
                                    alt="marketing illustration" class="img-fluid">
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach

        </div>
    </section>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////
                                                       START SECTION 5 - THE TESTIMONIALS
                        /////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <section id="testimonials" class="testimonials">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1"
                d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
        <div class="container">
            <div class="row text-center text-white">
                <h1 class="display-3 fw-bold">Testimonials</h1>
                <hr style="width: 100px; height: 3px; " class="mx-auto">
                <p class="lead pt-1">what our clients are saying</p>
            </div>

            <!-- START THE CAROUSEL CONTENT  -->
            <div class="row align-items-center">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($testimonials as $testimonial)
                            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                <!-- testimonials card  -->
                                <div class="testimonials__card">
                                    <p class="lh-lg mb-4" style="font-size:22px">
                                        <i class="fas fa-quote-left"></i> {{ $testimonial->quote }} <i
                                            class="fas fa-quote-right"></i>
                                    </p>
                                </div>
                                <!-- client picture  -->
                                <div class="testimonials__picture">
                                    <img src="{{ asset('backend/assets/images/testimonial/' . $testimonial->image) }}"
                                        alt="client-1 picture" class="rounded-circle img-fluid">
                                </div>
                                <!-- client name & role  -->
                                <div class="testimonials__name">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <p class="fw-light">{{ $testimonial->profession }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-light fas fa-long-arrow-alt-left" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        </button>
                        <button class="btn btn-outline-light fas fa-long-arrow-alt-right" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1"
                d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                                               START SECTION 6 - THE FAQ
                        //////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <section id="faq" class="faq">
        <div class="container">
            <div class="row text-center">
                <h1 class="display-3 fw-bold text-uppercase">faq</h1>
                <div class="heading-line"></div>
                <p class="lead">frequently asked questions, get knowledge befere hand</p>
            </div>
            <!-- ACCORDION CONTENT  -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <!-- ACCORDION ITEM -->
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item shadow mb-3">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $index }}" aria-expanded="true"
                                        aria-controls="collapse-{{ $index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $index }}" class="accordion-collapse collapse show"
                                    aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">{{ $faq->answer }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////
                                                      START SECTION 7 - THE PORTFOLIO
                        //////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row text-center mt-5">
                <h1 class="display-3 fw-bold text-capitalize">Latest work</h1>
                <div class="heading-line"></div>
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint porro temporibus distinctio.
                </p>
            </div>
            <!-- FILTER BUTTONS  -->
            {{-- <div class="row mt-5 mb-4 g-3 text-center">
                <div class="col-md-12">
                    <button class="btn btn-outline-primary" type="button">All</button>
                    <button class="btn btn-outline-primary" type="button">websites</button>
                    <button class="btn btn-outline-primary" type="button">design</button>
                    <button class="btn btn-outline-primary" type="button">mockup</button>
                </div>
            </div> --}}

            <!-- START THE PORTFOLIO ITEMS  -->
            <div class="row mt-5">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-box shadow">

                            {{-- Portfolio Link --}}
                            <a href="{{ $portfolio->link }}" target="_blank">

                                {{-- Portfolio Image --}}
                                <img src="{{ asset('backend/assets/images/portfolio/' . $portfolio->image) }}"
                                    title="portfolio picture" class="img-fluid">

                                <div class="portfolio-info">
                                    <div class="caption">

                                        {{-- Portfolio Name --}}
                                        <h4>{{ $portfolio->name }}</h4>

                                        {{-- Portfolio Type --}}
                                        <p>{{ $portfolio->type }}</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////
                                      START SECTION 8 - GET STARTED
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <section id="contact" class="get-started">
        <div class="container">
            <div class="row text-center">
                <h1 class="display-3 fw-bold text-capitalize">Get started</h1>
                <div class="heading-line"></div>
                <p class="lh-lg">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero illum architecto modi.
                </p>
            </div>

            <!-- START THE CTA CONTENT  -->
            <div class="row text-white">
                <div class="col-12 col-lg-6 gradient shadow p-3">
                    <div class="cta-info w-100">
                        <h4 class="display-4 fw-bold">100% Satisfaction Guaranteed</h4>
                        <p class="lh-lg">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam alias optio minima, tempore
                            architecto sint ipsam dolore tempora facere laboriosam corrupti!
                        </p>
                        <h3 class="display-3--brief">What will be the next step?</h3>
                        <ul class="cta-info__list">
                            <li>We'll prepare the proposal.</li>
                            <li>we'll discuss it together.</li>
                            <li>let's start the discussion.</li>
                        </ul>
                    </div>
                </div>

                <!-- RIGHT SIDE CONTENT  -->
                <div class="col-12 col-lg-6 bg-white shadow p-3">
                    <div class="form w-100 pb-2">
                        <h4 class="display-3--title mb-5">start your project</h4>

                        @if (session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('viewers.message') }}" method="POST" class="row">
                            @csrf

                            {{-- Viewers Name --}}
                            <div class="col-lg-12 col-md mb-3">
                                <input name="name" type="text" placeholder="Your Name" id="inputFirstName"
                                    class="shadow form-control form-control-lg">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Viewers Email --}}
                            <div class="col-lg-12 mb-3">
                                <input name="email" type="email" placeholder="email address" id="inputEmail"
                                    class="shadow form-control form-control-lg">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Viewers Message --}}
                            <div class="col-lg-12 mb-3">
                                <textarea name="message" placeholder="message" id="message" rows="8"
                                    class="shadow form-control form-control-lg"></textarea>

                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-center d-grid mt-1">
                                <button type="submit" class="btn btn-primary rounded-pill pt-3 pb-3">
                                    submit
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
