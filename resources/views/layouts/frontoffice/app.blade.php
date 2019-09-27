<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="img/index/favicon.png" sizes="16x16">
    <!--css-->
    <link href="{{ asset('frontoffice/css/style-1.css') }}" rel="stylesheet" type="text/css">
    <!--BOOTSTRAP-->
    <link href="{{ asset('frontoffice/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="{{ asset('frontoffice/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontoffice/fonts/font/flaticon.css') }}" rel="stylesheet" type="text/css">
    <!--thumbnail-slider-->
    <link href="{{ asset('frontoffice/css/lightslider.css') }}" rel="stylesheet" type="text/css">
    <!--slider-->
    <link href="{{ asset('frontoffice/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontoffice/css/theme.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <!--header-->
<header class="border">
        <div class="container header-sec">
    
            <div class="col-md-5 header">
                <div class="header-left">
                    <div class="top-bar-list phone">
                        <i class="flaticon-phone-call"></i>
                        <a href="tel:12123121">+212 (0) 537 77 33 22</a>
                    </div>
                    <div class="top-bar-list">
                        <i class="flaticon-e-mail-envelope"></i>
                        <p>Info@grabyshop.com</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-7 col-sm-12 header">
                <div class="header-right">
                    <div class="top-bar-list">
                        <i class="flaticon-placeholder"></i>
                        <a href="#">
                            <p>Store locator</p>
                        </a>
                    </div>
                    <div class="top-bar-list">
                        <i class="flaticon-delivery"></i>
                        <a href="#">
                            <p>Track order</p>
                        </a>
                    </div>
                    <div class="top-bar-list">
                        <i class="flaticon-login"></i>
                        <p><b><a href="#" data-toggle="modal" data-target="#myModal">Register</a></b> or <b><a href="#"
                                    data-toggle="modal" data-target="#myModal2">Sign in</a></b></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
    
        </div>
    
    
    
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <div class="col-sm-5 modal-img">
                            <img src="img/index/modal-bg.jpg" class="img-responsive" alt="" />
                            <h2>Sign In</h2>
                            <p>Sign up our Website and receive up to $100 coupon for first shopping</p>
                        </div>
                        <div class="modal-img-text"><a href="#"><img src="http://staff.babcasa.com/img/logo.png" alt=""
                                    class="img-responsive" /></a></div>
                        <div class="col-sm-7 modal-text">
    
                            <div class="form-sec">
    
    
                                <div class="tab-content">
                                    <div class="social-button">
                                        <div class="facebook"><a href="#"><i class="fa fa-facebook-f"
                                                    aria-hidden="true"></i>Sign in with facebook</a></div>
                                        <div class="facebook google"><a href="#"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i>Sign in with google</a></div>
                                        <div class="facebook twitter text-center"><a href="#"><i
                                                    class="fa fa-twitter pull-left" aria-hidden="true"></i>Sign in with
                                                twitter</a></div>
                                    </div>
                                    <div class="or"><span>Or</span></div>
                                    <div class="input-row">
                                        <h5>username</h5><input class="input-1" type="text" name="username"
                                            placeholder="Enter username" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>email</h5><input class="input-1" type="email" name="email"
                                            placeholder="Enter your Email ID" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>password</h5><input class="input-1" type="text" name="password"
                                            placeholder="Enter your password" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>Re-enter your password</h5><input class="input-1" type="text"
                                            name="re-enter-password" placeholder="Re-Enter your Password" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="privacy-sec">
                                        <input id="4" type="checkbox" /><label for="4">Remember me</label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="button">
                                        <a href="#">Get started</a>
                                    </div>
                                    <div class="modal-acc">
                                        <p>Already have an account? <a data-toggle="modal" id="reg-m"
                                                data-target="#myModal2" href="#">Log In</a></p>
                                    </div>
    
                                </div>
    
                            </div>
    
                        </div>
    
                        <div class="clearfix"></div>
    
                    </div>
                </div>
            </div>
        </div>
    
        <!--modal-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <div class="col-sm-5 modal-img">
                            <img src="img/index/modal-bg.jpg" class="img-responsive" alt="" />
                            <h2>Login</h2>
                            <p>Sign up our Website and receive up to $100 coupon for first shopping</p>
                            <div class="modal-img-text"><a href="#"><img src="http://staff.babcasa.com/img/logo.png" alt=""
                                        class="img-responsive" /></a></div>
                        </div>
                        <div class="col-sm-7 modal-text">

                            <div class="form-sec">
                                <div class="tab-content">
                                    <div class="social-button">
                                        <div class="facebook"><a href="#"><i class="fa fa-facebook-f"
                                                    aria-hidden="true"></i>Sign in with facebook</a></div>
                                        <div class="facebook google"><a href="#"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i>Sign in with google</a></div>
                                        <div class="facebook twitter text-center"><a href="#"><i
                                                    class="fa fa-twitter pull-left" aria-hidden="true"></i>Sign in with
                                                twitter</a></div>
                                    </div>
                                    <div class="or"><span>Or</span></div>
                                    <div class="input-row">
                                        <h5>email</h5><input class="input-1" type="email" name="email"
                                            placeholder="Enter your Email ID" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>password</h5><input class="input-1" type="text" name="password"
                                            placeholder="Enter your password" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="privacy-sec">
                                        <input id="5" type="checkbox" /><label for="5">Remember me</label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="button">
                                        <a href="#">Get started</a>
                                    </div>
                                    <div class="modal-acc">
                                        <p>Already have an account? <a data-toggle="modal" id="log-m" data-target="#myModal"
                                                href="#">Sign In</a></p>
                                    </div>
                                    <div class="swiss-right">
                                        <p>© 2018 <a href="#">Graby shop</a>. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <!--js-->
    <script src="js/ajax.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--slider-->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/theme.js"></script>
    <!--countdown-->
    <script src="js/countdown.js"></script>
    <!--light-slider-->
    <script src="js/lightslider.js"></script>
    <!--index-->
    <script src="js/index.js"></script>
    <!--client-slider-->
    <script src="js/jquery.flexisel.js"></script>
    <!--circle-count-down-->
    <script src="js/TimeCircles.js"></script>
    <script>
        $("#DateCountdown").TimeCircles();
    </script>
    <!--custom-->
    <script src="js/custom.js"></script>
</body>

</html>