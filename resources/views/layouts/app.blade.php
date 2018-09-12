<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'BAB CASA') }} </title>

    
    @yield('css')


</head>

<body class="fixed-header windows desktop pace-done">

    @yield('body')



    @yield('script')

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