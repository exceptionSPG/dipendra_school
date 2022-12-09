@php

$site = App\Models\Backend\SiteSetting::find(1);

@endphp

<!-- footer -->
<footer>
    <!-- newsletter -->
    <!-- <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
                    <h3 class="text-white">Subscribe Now</h3>
                    <form action="#">
                        <div class="input-wrapper">
                            <input type="email" class="form-control border-0" id="newsletter" name="newsletter" placeholder="Enter Your Email...">
                            <button type="submit" value="send" class="btn btn-primary">Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- footer content -->
    <div class="footer bg-footer section border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
                    <!-- logo -->
                    <a class="logo-footer" href="{{ route('index')}}"><img class="img-fluid mb-4" src="{{ asset($site->logo)}}" alt="Dipendra HSS Logo"></a>
                    <ul class="list-unstyled">
                        <li class="mb-2">{{ $site->school_address}}</li>
                        <li class="mb-2"><a href="tel:{{ $site->phone_one }}">{{ $site->phone_one }}</a> </li>
                        <li class="mb-2"><a href="tel:{{ $site->phone_two }}">{{ $site->phone_two }}</a></li>
                        <li class="mb-2"><a href="mailto:{{ $site->email }}"> {{ $site->email }}</a></li>
                    </ul>
                </div>
                <!-- company -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">COMPANY</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="about.html">About Us</a></li>
                        <li class="mb-3"><a class="text-color" href="teacher.html">Our Teacher</a></li>
                        <li class="mb-3"><a class="text-color" href="contact.html">Contact</a></li>
                        <li class="mb-3"><a class="text-color" href="blog.html">Blog</a></li>
                    </ul>
                </div>
                <!-- links -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">LINKS</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="courses.html">Courses</a></li>
                        <li class="mb-3"><a class="text-color" href="events.html">Events</a></li>
                        <li class="mb-3"><a class="text-color" href="notice.html">Notice</a></li>
                        <li class="mb-3"><a class="text-color" href="scholarship.html">Scholarship</a></li>
                    </ul>
                </div>
                <!-- support -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">SUPPORT</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="https://themefisher.com/blog">Forums</a></li>
                        <li class="mb-3"><a class="text-color" href="https://docs.themefisher.com/">Documentation</a></li>
                        <li class="mb-3"><a class="text-color" href="#!">Language</a></li>
                        <li class="mb-3"><a class="text-color" href="#!">Release Status</a></li>
                    </ul>
                </div>
                <!-- support -->
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                    <h4 class="text-white mb-5">RECOMMEND</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="https://themefisher.com/">WordPress</a></li>
                        <li class="mb-3"><a class="text-color" href="https://themefisher.com/">LearnPress</a></li>
                        <li class="mb-3"><a class="text-color" href="https://themefisher.com/">WooCommerce</a></li>
                        <li class="mb-3"><a class="text-color" href="https://themefisher.com/">bbPress</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright -->
    <div class="copyright py-4 bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text-sm-left text-center">
                    <p class="mb-0">Copyright &copy;
                        <script>
                            var CurrentYear = new Date().getFullYear()
                            document.write(CurrentYear)
                        </script>
                        , designed & developed by <a href="https://themefisher.com/" class="text-muted">Themefisher</a>
                    </p>
                </div>
                <div class="col-sm-5 text-sm-right text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="https://facebook.com/themefisher/"><i class="ti-facebook text-primary"></i></a></li>
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="https://twitter.com/themefisher"><i class="ti-twitter-alt text-primary"></i></a></li>
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="https://github.com/themefisher"><i class="ti-github text-primary"></i></a></li>
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="https://instagram.com/themefisher/"><i class="ti-instagram text-primary"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->