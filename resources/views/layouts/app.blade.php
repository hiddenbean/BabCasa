<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'BAB Casa') }} </title>
 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('pages/css/pages-icons.css') }} " rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('pages/css/pages.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
 
    
  
</head>
<body class="fixed-header windows desktop pace-done">

    @yield('body')


    <!-- Javascript section -->  
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- BEGIN VENDOR JS -->
    <script src="{{ asset('plugins/pace/pace.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- END VENDOR JS -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }} " type="text/javascript"></script>
    <script src="{{ asset('pages/js/pages.min.js') }}"></script>
    <script src="{{ asset('js/laravel.ajax.js') }}"></script>
    @yield('script')

    <!-- Laravel ajax header  -->
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

</body>
</html>
