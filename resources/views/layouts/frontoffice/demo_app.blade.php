<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'BABCasa') }} </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/demo_app.css') }}">
    
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/')}}"><img src="{{ asset('img/logos/logo_black_400px.png') }}" alt="BABCASA logo" width="220px"></a>
            <ul class="navbar-nav nav-menu">
                <li><a href="#">{{ __('frontend.demo_app.navbar.link_1') }}</a></li>
                <li><a href="#">{{ __('frontend.demo_app.navbar.link_2') }}</a></li>
                <li><a href="https://affiliate.babcasa.com">{{ __('frontend.demo_app.navbar.link_3') }}</a></li>
                <li><a href="#">{{ __('frontend.demo_app.navbar.link_4') }}</a></li>
            </ul>
        </nav>
    </div>

    <div class="container m-t-65">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{ __('frontend.demo_app.article_1.title') }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <article>
                    <p>
                        {{ __('frontend.demo_app.article_1.phrase_1') }}
                    </P>
                    <p>
                        {{ __('frontend.demo_app.article_1.phrase_2') }}
                    </p>
                    <p>
                        {{ __('frontend.demo_app.article_1.phrase_3') }}
                    </p>
                    <p>
                        {{ __('frontend.demo_app.article_1.phrase_4') }}
                    </p>
                </article>

                <article>
                    <h1>
                    {{ __('frontend.demo_app.article_2.title') }}
                    </h1>
                    <ol>
                        <li><a href="#" class="secondary">{{ __('frontend.demo_app.article_2.link_1') }}</a> {{ __('frontend.demo_app.article_2.phrase_1') }}</li>
                        <li><a href="#" class="secondary">{{ __('frontend.demo_app.article_2.link_2') }}</a> {{ __('frontend.demo_app.article_2.phrase_2') }}</li>
                        <li><a href="#" class="secondary">{{ __('frontend.demo_app.article_2.link_3') }}</a> {{ __('frontend.demo_app.article_2.phrase_3') }}</li>
                    </ol>
                </article>

                <article>
                    <h1>
                        {{ __('frontend.demo_app.article_3.title') }}
                    </h1>
                    <ul>
                        <li>{{ __('frontend.demo_app.article_3.phrase_1') }} <a href="#" class="secondary">{{ __('frontend.demo_app.article_3.link_1') }}</a></li>
                        <li>{{ __('frontend.demo_app.article_3.phrase_2') }} <a href="#" class="secondary">{{ __('frontend.demo_app.article_3.link_2') }}</a></li>
                        <li>{{ __('frontend.demo_app.article_3.phrase_3') }}<a href="#" class="secondary">{{ __('frontend.demo_app.article_3.link_3') }}</a></li>
                    </ul>
                    <p>
                        {{ __('frontend.demo_app.article_3.paragraphe_1') }}
                    </p>
                </article>
            </div>
            <div class="col-md-4">
                <article>
                    <h1>{{ __('frontend.demo_app.aside.article_1.title') }}</h1>
                    <p>
                        {{ __('frontend.demo_app.aside.article_1.text_1') }}<br>
                        {{ __('frontend.demo_app.aside.article_1.text_2') }}<br>
                        {{ __('frontend.demo_app.aside.article_1.text_3') }}<br>
                        {{ __('frontend.demo_app.aside.article_1.text_4') }}<br>
                        {{ __('frontend.demo_app.aside.article_1.text_5') }}<br>
                    </p>
                </article>

                <article>
                    <h1>{{ __('frontend.demo_app.aside.article_2.title') }}</h1>
                    <p>
                        {{ __('frontend.demo_app.aside.article_2.text_1') }}<br>
                        {{ __('frontend.demo_app.aside.article_2.text_2') }}<br>
                        {{ __('frontend.demo_app.aside.article_2.text_3') }}<br>
                        {{ __('frontend.demo_app.aside.article_2.text_4') }}<br>
                        {{ __('frontend.demo_app.aside.article_2.text_5') }}<br>
                        {{ __('frontend.demo_app.aside.article_2.text_6') }}<br>
                    </p>
                </article>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2 logo-footer">
                    <a href="{{ url('/')}}"><img src="{{ asset('img/logos/Logo_white_300px.png') }}" alt="BABCASA logo"></a>
                </div>
                <div class="col-md-2">
                    <ul class="footer">
                        <li class="title">{{ __('frontend.demo_app.footer.row_1.column_1.title') }}</li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_1.link_1') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_1.link_2') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer">
                        <li class="title">{{ __('frontend.demo_app.footer.row_1.column_2.title') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_2.link_1') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_2.link_2') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_2.link_3') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_2.link_4') }}</a></li>                        
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer">
                        <li class="title">{{ __('frontend.demo_app.footer.row_1.column_3.title') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_3.link_1') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_3.link_2') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_1.column_3.link_3') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="row m-t-65">
                <div class="col-md-9">
                    <ul class="copyrights">
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_2.column_1.link_1') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_2.column_1.link_2') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_2.column_1.link_3') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_2.column_1.link_4') }}</a></li>
                        <li><a href="#">{{ __('frontend.demo_app.footer.row_2.column_1.link_5') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 text-right copyrights">
                    <a href="#">{{ __('frontend.demo_app.footer.row_2.column_2.link_1') }}</a>
                    <br>
                    {{ __('frontend.demo_app.footer.row_2.column_2.text_1') }}
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/27fca30512.js" crossorigin="anonymous"></script>

</body>
</html>