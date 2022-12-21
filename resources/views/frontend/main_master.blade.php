<!DOCTYPE html>



<html lang="en">

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>@yield('title') </title>

    <!-- Mobile Specific Metas
	================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Educenter HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="educenter" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/themify-icons/themify-icons.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/animate/animate.css') }}">
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/aos/aos.css') }}">
    <!-- venobox popup -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/venobox/venobox.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">


    <!-- Our Journey Stylesheet -->
    <link href="{{ asset('frontend/css/journey_css.css') }}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">


    <!-- CSS file for our journey section -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!--toaster css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6392aa2865735e001232d82b&product=inline-share-buttons' async='async'></script>

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0&appId=1490816311396097&autoLogAppEvents=1" nonce="gIyVAVJU"></script>
    <!-- preloader start -->
    <div class="preloader">
        <img src="{{ asset('frontend/images/preloader.gif') }}" alt="preloader">
    </div>
    <!-- preloader end -->


    @include('frontend.body.header')


    @include('frontend.body.signup_modal')




    @yield('content')

    @include('frontend.body.footer')

    <!-- jQuery -->
    <script src="{{ asset('frontend/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
    <!-- aos -->
    <script src="{{ asset('frontend/plugins/aos/aos.js') }}"></script>
    <!-- venobox popup -->
    <script src="{{ asset('frontend/plugins/venobox/venobox.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('frontend/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
    <script src="{{ asset('frontend/plugins/google-map/gmap.js') }}"></script>



    <!-- Main Script -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <!-- Script for toast -->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>


</body>

</html>