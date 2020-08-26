<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('bower_components/review_travel/img_travel/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_travel/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/review_travel/css_travel/post.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!-- header-start -->
    @include('header')
    <!-- header-end -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('footer')
    <!-- Footer Section End -->

    <!-- JS here -->
    <script src="{{ asset('bower_components/review_travel/js_travel/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/popper.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/ajax-form.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/waypoints.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/scrollIt.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/wow.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/nice-select.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/plugins.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/gijgo.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/slick.min.js') }}"></script>
   

    
    <!--contact js-->
    <script src="{{ asset('bower_components/review_travel/js_travel/contact.js') }}"></script>
    <!-- <script src="{{ asset('bower_components/review_travel/js_travel/js/jquery.ajaxchimp.min.js') }}"></script> -->
    <script src="{{ asset('bower_components/review_travel/js_travel/jquery.form.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/mail-script.js') }}"></script>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    @yield('script')
    <script src="{{ asset('bower_components/review_travel/js_travel/main.js') }}"></script>
</body>

</html>
