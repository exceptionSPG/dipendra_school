@php

use Illuminate\Support\Facades\Route;

$route = Route::current()->getName();
@endphp
<!-- header -->
<header class="fixed-top header">
    <!-- top header -->
    <div class="top-header py-2 bg-white">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4 text-center text-lg-left">
                    <a class="text-color mr-3" href="tel:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
                    <ul class="list-inline d-inline">
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://facebook.com/themefisher/"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://twitter.com/themefisher"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://github.com/themefisher"><i class="ti-github"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://instagram.com/themefisher/"><i class="ti-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8 text-center text-lg-right">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
                        <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
                        <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li>
                        <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#loginModal" data-toggle="modal" data-target="#loginModal">login</a></li>
                        <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#signupModal" data-toggle="modal" data-target="#signupModal">register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->
    <div class="navigation w-100">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item {{ ($route == 'index' ) ? 'active':'' }}">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>

                        <li class="nav-item @@about dropdown view {{ ($route == 'frontend.about.introduction' ||$route == 'frontend.about.teachers' ||$route == 'frontend.about.timelines'  ) ? 'active':'' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="{{ ($route == 'frontend.about.introduction' ) ? 'active':'' }}"><a class="dropdown-item" href="{{ route('frontend.about.introduction') }}">Introduction</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.about.teachers') }}">Our Teachers</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.about.timelines') }}">Our Journey</a></li>



                            </ul>
                        </li>



                        <li class="nav-item @@courses">
                            <a class="nav-link" href="courses.html">COURSES</a>
                        </li>
                        <li class="nav-item @@events">
                            <a class="nav-link" href="events.html">EVENTS</a>
                        </li>
                        <li class="nav-item @@blog">
                            <a class="nav-link" href="blog.html">BLOG</a>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="teacher.html">Teacher</a></li>
                                <li><a class="dropdown-item" href="teacher-single.html">Teacher Single</a></li>
                                <li><a class="dropdown-item" href="notice.html">Notice</a></li>
                                <li><a class="dropdown-item" href="notice-single.html">Notice Details</a></li>
                                <li><a class="dropdown-item" href="research.html">Research</a></li>
                                <li><a class="dropdown-item" href="scholarship.html">Scholarship</a></li>
                                <li><a class="dropdown-item" href="course-single.html">Course Details</a></li>
                                <li><a class="dropdown-item" href="event-single.html">Event Details</a></li>
                                <li><a class="dropdown-item" href="blog-single.html">Blog Details</a></li>

                                <li class="dropdown-item dropdown dropleft">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdownSubmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sub Menu
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu" aria-labelledby="navbarDropdownSubmenu">
                                        <li><a class="dropdown-item" href="#!">Sub Menu 01</a></li>
                                        <li><a class="dropdown-item" href="#!">Sub Menu 02</a></li>
                                        <li><a class="dropdown-item" href="#!">Sub Menu 03</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item @@contact">
                            <a class="nav-link" href="contact.html">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- /header -->