<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="apple-touch-icon" href="pages/ico/60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{ config('app.name', 'BAB CASA') }} </title>

        <link href="{{ asset('plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="{{ asset('plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
        @yield('before_css')
        <link rel="stylesheet" href="{{ asset('pages/css/pages.css') }}"> 
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
        @yield('after_css') 
    </head>
    <body class="fixed-header">

        @yield('body')

        <!-- BEGIN VENDOR JS -->
        <script src="{{ asset('plugins/pace/pace.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/modernizr.custom.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery-actual/jquery.actual.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        @yield('before_script')
        
        <!-- END VENDOR JS -->
        <script src="{{ asset('js/laravel.ajax.js') }}"></script>
        <script src="{{ asset('js/laravel.js') }}"></script>
        <script src="{{ asset('pages/js/pages.min.js') }}"></script>
        @yield('after_script')

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
        <script>
        $('#langs').click(function() {
            $('.dropup-content').show();
        });

        $('.dropup-content a').click(function() {
            $('.dropup-content').hide();
        });

        $(document).mouseup(function(e) 
        {
            var container = $(".dropup-content");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
            container.hide();
            }
        });
        </script>
    </body>
</html>