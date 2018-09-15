<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'BAB Casa') }} </title>

    @yield('before_css')
    <!--css-->
    <link href="{{  asset('frontoffice/css/style-1.css')  }}" rel="stylesheet" type="text/css">
    <!--BOOTSTRAP-->
    <link href="{{  asset('frontoffice/css/bootstrap.css')  }}
    " rel="stylesheet" type="text/css">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="{{  asset('frontoffice/fonts/font-awesome-4.7.0/css/font-awesome.min.css')  }}" rel="stylesheet" type="text/css">
    <link href="{{  asset('frontoffice/fonts/font/flaticon.css')  }}" rel="stylesheet" type="text/css">
    <!--thumbnail-slider-->
    <link href="{{  asset('frontoffice/css/lightslider.css')  }}" rel="stylesheet" type="text/css">
    <!--slider-->
    <link href="{{  asset('frontoffice/css/owl.carousel.min.css')  }}" rel="stylesheet" type="text/css">
    <link href="{{  asset('frontoffice/css/theme.css')  }}" rel="stylesheet" type="text/css">
    <!-- costum css -->
    <link href="{{  asset('frontoffice/css/babcasa.css')  }}" rel="stylesheet" type="text/css">
    @yield('after_css') 


</head>

<body>

    @yield('body')
    <!-- Javascript section -->
    @yield('before_script')
    <!--js-->
    <script src="{{  asset('frontoffice/js/ajax.js') }}"></script>
    <script src="{{  asset('frontoffice/js/bootstrap.min.js') }}"></script>
    <!--slider-->
    <script src="{{  asset('frontoffice/js/owl.carousel.min.js') }}"></script> 
    <script src="{{  asset('frontoffice/js/theme.js') }}"></script>
    <!--countdown-->
    <script src="{{  asset('frontoffice/js/countdown.js') }}"></script>
    <!--light-slider-->
    <script src="{{  asset('frontoffice/js/lightslider.js') }}"></script>
    <!--index-->
    <script src="{{  asset('frontoffice/js/index.js') }}"></script>
    <!--client-slider-->
    <script src="{{  asset('frontoffice/js/jquery.flexisel.js') }}"></script>
    <!--circle-count-down-->
    <script src="{{  asset('frontoffice/js/TimeCircles.js') }}"></script>
    <script>
    $("#DateCountdown").TimeCircles();
    </script>
    <!--custom-->
    <script src="{{  asset('frontoffice/js/custom.js') }}"></script>
    <!-- BEGIN VENDOR JS -->
    @yield('after_script')


    <script src="{{ asset('pages/js/pages.min.js') }}"></script>
    <!-- Laravel ajax header  -->
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

</body>

</html>