@extends('layouts.frontoffice.app')

@section('body')
<div class="index-new">
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    <header class="border">
        <div class="container header-sec">
            <div class="col-md-12 col-sm-12 header">
                <div class="header-right">
                    <div class="top-bar-list">
                        <a href="#">
                            <p>Buyer protectio</p>
                        </a>
                    </div>
                    <div class="top-bar-list">
                        <a href="#">
                            <p>Help</p>
                        </a>
                    </div>
                    <div class="top-bar-list">
                        <a href="#">
                            <p>Langues (English)</p>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="col-sm-5 modal-img">
                            <img src="{{ asset('img/modal-bg.jpg') }}" class="img-responsive" alt="" />
                            <h2>Sign In</h2>
                            <p>Sign up our Website and receive up to  DH 100 coupon for first shopping</p>
                        </div>
                        <div class="col-sm-7 modal-text">
                            <div class="form-sec">
                                <div class="tab-content">
                                    <div class="social-button">
                                        <div class="facebook"><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i>Sign
                                                in with facebook</a></div>
                                        <div class="facebook google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i>Sign
                                                in with google</a></div>
                                        <div class="facebook twitter text-center"><a href="#"><i class="fa fa-twitter pull-left"
                                                    aria-hidden="true"></i>Sign in with twitter</a></div>
                                    </div>
                                    <div class="or"><span>Or</span></div>
                                    <div class="input-row">
                                        <h5>username</h5><input class="input-1" type="text" name="username" placeholder="Enter username" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>email</h5><input class="input-1" type="email" name="email" placeholder="Enter your Email ID" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>password</h5><input class="input-1" type="text" name="password" placeholder="Enter your password" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>Re-enter your password</h5><input class="input-1" type="text" name="re-enter-password"
                                            placeholder="Re-Enter your Password" />
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
                                        <p>Already have an account? <a data-toggle="modal" id="reg-m" data-target="#myModal2"
                                                href="#">Log In</a></p>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="col-sm-5 modal-img">
                            <img src="{{ asset('img/modal-bg.jpg') }}" class="img-responsive" alt="" />
                            <h2>Login</h2>
                            <p>Sign up our Website and receive up to  DH 100 coupon for first shopping</p>
                        </div>
                        <div class="col-sm-7 modal-text">
                            <div class="form-sec">
                                <div class="tab-content">
                                    <div class="social-button">
                                        <div class="facebook"><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i>Sign
                                                in with facebook</a></div>
                                        <div class="facebook google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i>Sign
                                            in with google</a></div>
                                        <div class="facebook twitter text-center"><a href="#"><i class="fa fa-twitter pull-left"
                                            aria-hidden="true"></i>Sign in with twitter</a></div>
                                    </div>
                                    <div class="or"><span>Or</span></div>
                                    <div class="input-row">
                                        <h5>email</h5><input class="input-1" type="email" name="email" placeholder="Enter your Email ID" />
                                        <span class="underline"></span>
                                    </div>
                                    <div class="input-row">
                                        <h5>password</h5><input class="input-1" type="text" name="password" placeholder="Enter your password" />
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
                                        <p>© 2018 <a href="#">BAB Casa</a>. All Rights Reserved.</p>
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

    <!-- sreash -->
    <div class="container logo-bar">
        <div class="col-md-3 logo-name text-center">
            <a href="/"><img src="{{ asset('logos/babcasa.png') }}" alt="" class="img-responsive" style="max-width: 200px; margin-top: 13px"/></a>
        </div>
        <div class="col-md-7 search">
            <input type="text" name="search" placeholder="I'm shopping for..." />
            <select>
                <option>All Categories</option>
                <option>Men</option>
                <option>Women</option>
                <option>Electronics</option>
                <option>Smart Phones</option>
            </select>
            <div class="round search-round rectangle-search"><a href="/list"><i class="flaticon-search"></i></a></div>
        </div>
        <div class="col-md-2 shopping-cart no-padding">
            <div class="icon-round">
                <a href="#"><i class="flaticon-heart"></i></a>
                <div class="cart-item">
                    <div class="cart-mail"><a href="#"><i class="flaticon-shopping-cart"></i><span>0</span></a></div>
                    <p><a href="#">My cart<span> DH 0.00</span></a></p>						    
                    <div class="cart-item-hover">
                        <div class="cart-item-list">
                            <img src="{{ asset('img/cart-item-1.jpg') }}" alt="" />
                            <a href="#"><h3>Beats Classic Headphone</h3></a>
                            <b><a href="#">X</a></b>
                            <p> DH 88.00 <del> DH 120.00</del></p>
                        </div>
                        <div class="cart-item-list">
                            <img src="{{ asset('img/cart-item-2.jpg') }}" alt="" />
                            <a href="#"><h3>Samsung Classic Tablet</h3></a>
                            <b><a href="#">X</a></b>
                            <p> DH 90.00 <del> DH 122.00</del></p>
                        </div>
                        <div class="border"></div>
                        <div class="cart-total">
                            <h6>Total Price</h6> <p> DH 178.00</p><div class="clearfix"></div>
                            <a href="#" class="cart-view">View all</a>
                            <a href="check-out.html" class="cart-checkout">Check out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--new-->
<div class="babcasa-background">
<!--new-->
<div class="container department pt-30">

	<div class="col-md-3 product-sec new-left">
   		 <div class="categories">
    		 <ul>
       		<li class="sub-menu"><a class="main-a" href="javascript:void(0)"><i class="flaticon-bars"></i>CATEGORIES </a>
            
            	                
                <ul>
                	<li><a href="#"><i class="flat flaticon-coupon"></i>Deal of the Day<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a> 
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
							<div class="categories-img">
								<div class="single-banner-2"><a href="#"><img src="{{ asset('img/babcasa-texture.png') }}" class="img-responsive" alt="banner"></a></div>
							</div> 
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-percentage"></i>Top 100 Exclusive Offers<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-new"></i>New Arrivals<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>

										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-photo-camera"></i>Cameras, Audio & Video <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-smartphone"></i>Mobiles & Tablets<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-clock-with-white-face"></i>Watches & Eyewear<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-laptop"></i>Computers & Accessories<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
							<div class="categories-img">
								<div class="single-banner-2"><a href="#"><img src="{{ asset('img/menu-banner.jpg') }}" class="img-responsive" alt="banner"></a></div>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-music-player"></i>Movies, Music & Games<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    	<div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    <li><a href="#"><i class="flat flaticon-monitor"></i>TV & Audio <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                   		 <div class="categories-mega-menu categories-mega-menu-2">
							<div class="categories-main-menu">
								<span>
										<a href="#" class="title">Headphones Solo™2</a>
										<a href="#">Headphones with Mic</a>
										<a href="#">Bluetooth/Wireless</a>
										<a href="#">Extra Bass</a>
										<a href="#">Noise Cancelling</a>
								</span>
								<span>
										<a href="#" class="title">Headphones Pro</a>
										<a href="#">Wire Managers</a>
										<a href="#">Hi-Res Music Players</a>
										<a href="#">Headphone Amplifiers</a>
										<a href="#">Headphone DACs</a>
								</span>
								<span>
										<a href="#" class="title">Studio wireless</a>
										<a href="#">Wireless Headphones</a>
										<a href="#">On Ear Headphones</a>
										<a href="#">Planar Magnetic</a>
										<a href="#">Bone Conduction</a>
								</span>
								<span>
										<a href="#" class="title">Accessories</a>
										<a href="#">Earbud Tips</a>
										<a href="#">Headphone Amps</a>
										<a href="#">Headphone Cases</a>
										<a href="#">Headphone Splitters</a>
								</span>
							</div>
						</div>
                    </li>
                    
                    
                </ul>
            
            </li>
        </ul>  
    </div>
    <div class="col-md-12 col-sm-6"><div class="new-banner-img ban-sec"><a href="#"><img src="{{ asset('img/banner-1.jpg') }}" class="img-responsive" alt="" /></a></div></div>
    <div class="col-md-12 col-sm-6"><div class="new-banner-img ban-sec"><a href="#"><img src="{{ asset('img/banner-2.jpg') }}" class="img-responsive" alt="" /></a></div></div>
    <div class="clearfix"></div>
    </div>
    
    
    <div class="col-md-6 hot-deal text-left">
	
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{{ asset('img/Banner_1_small.jpg') }}" alt="..." />
            </div>
            <div class="item">
              <img src="{{ asset('img/Banner_2_small.jpg') }}" alt="..." />
            </div>
            <div class="item">
                <img src="{{ asset('img/Banner_1_small.jpg') }}" alt="..." />
              </div>
          </div>
        
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    
        <div class="col-md-12 mt-30 highlight-sec high-sale">
            
            <div id="carousel-example-generic-1" class="carousel slide" data-ride="carousel">
            <div class="col-md-12 col-sm-12 deal-heading text-center">
                    <h2>HOT DEALS</h2>
                </div>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                <div class="carousel-caption">
                
                        <div class="col-md-4 col-sm-4 text-center"><img src="{{ asset('img/hot-deal.png') }}" class="img-responsive" alt="" /></div>
    
                        <div class="col-md-8 col-sm-8 offer-sale text-left sale">
                                <div class="offer">
                                    
                                    <div class="clearfix"></div>
                                    <h2><a href="#">Samsung Smart REFG230 4 Star </a></h2>
                                    <div class="price product-body">
                                        <h4>600.50 DH </h4>
                                        <h5> DH 750.20</h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div id="timer-1" class="text-center timer col-md-offset-0 col-sm-12">
                                            <h2>Hurry up! Offer ends in:</h2>
                                            <div class="col-sm-3 col-xs-6">
                                                <div id="days"></div>
                                                <p>Days</p>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                                <div id="hours"></div>
                                                <p>Hours</p>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                                <div id="minutes"></div>
                                                <p>Mins</p>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                                <div id="seconds"></div>
                                                <p>Secs</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div class="deal-bottom">
                                    	<a href="#" class="deal-wish"><i class="flaticon-heart"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick-modal" class="deal-view deal-wish"><i class="flaticon-4-search" aria-hidden="true"></i></a>
                                        <a href="#" class="deal-cart">ADD TO CART <i class="flaticon-3-signs"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div> 
                            </div>
                        <div class="clearfix"></div>
                  </div>
                </div>
                
                
               <div class="item">
                  <div class="carousel-caption">
                  
                        <div class="col-md-4 col-sm-4 text-center"><img src="{{ asset('img/hot-deal-1.png') }}" class="img-responsive" alt="" /></div>
    
                        <div class="col-md-8 col-sm-8 offer-sale text-left sale">
                                <div class="offer">
                                    
                                    <div class="clearfix"></div>
                                    <h2><a href="#">Beats Studio Wireless Over-Ear Headphone </a></h2>
                                    <div class="price product-body">
                                        <h4>595.50 DH </h4>
                                        <h5> DH 720.20</h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div id="timer" class="text-center timer col-md-offset-0 col-sm-12">
                                            <h2>Hurry up! Offer ends in:</h2>
                                            <div class="col-sm-3 col-xs-6">
                                                <div id="dayss"></div>
                                                <p>Days</p>
                                          </div>
                                          <div class="col-sm-3 col-xs-6">
                                                <div id="hourss"></div>
                                                <p>Hours</p>
                                          </div>
                                          <div class="col-sm-3 col-xs-6">
                                                <div id="minutess"></div>
                                                <p>Mins</p>
                                          </div>
                                          <div class="col-sm-3 col-xs-6">
                                                <div id="secondss"></div>
                                                <p>Secs</p>
                                          </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div class="deal-bottom">
                                    	<a href="#" class="deal-wish"><i class="flaticon-heart"></i></a>
                                    	<a href="#" data-toggle="modal" data-target="#quick-modal" class="deal-view deal-wish"><i class="flaticon-4-search" aria-hidden="true"></i></a>
                                        <a href="#" class="deal-cart">ADD TO CART <i class="flaticon-3-signs"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div> 
                            </div>
                        <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic-1" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic-1" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </a>
            </div>
            
        </div>
    
    </div>
    
    
    <div class="col-md-3 new-rated-product">
    <div class="top-rated-product deal-right">
    	<div class="deal-top-rated">
   				<h3>Top Rated</h3>
                
                    <div class="col-sm-6 col-md-12">
                    <div class="popular-product sale">
                    <a href="#"><img src="{{ asset('img/top-rated-new.jpg') }}" alt="" class="img-responsive text-center" /></a>
                    <h2><a href="#">Samsung RFG23 Classic Style</a></h2>
                    <h4>500.50 DH </h4>
                    </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-12">
                    <div class="popular-product sale">
                    <a href="#"><img src="{{ asset('img/top-rated-new-1.jpg') }}" alt="" class="img-responsive" /></a>
                    <h2><a href="#">Samsung j7 Prime Smart Phone</a></h2>
                    <h4>600.50 DH </h4>
                    </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-12">
                    <div class="popular-product sale">
                    <a href="#"><img src="{{ asset('img/top-rated-new-2.jpg') }}" alt="" class="img-responsive" /></a>
                    <h2><a href="#">HP Stream 14" Laptop Windows 10</a></h2>
                    <h4>550.50 DH </h4>
                    </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-12">
                    <div class="popular-product sale">
                    <a href="#"><img src="{{ asset('img/top-rated-new-3.jpg') }}" alt="" class="img-responsive" /></a>
                    <h2><a href="#">Canon Powershot Sx430 Shoot Camera</a></h2>
                    <h4>650.50 DH </h4>
                    </div>
                    </div>
                    
                    <div class="clearfix"></div>
        </div>
        <div class="product-sec">
        <div class="col-sm-12">
        	<div class="new-banner-img ban-sec">
            	<a href="#"><img src="{{ asset('img/banner-3.jpg') }}" class="img-responsive" alt="" /></a>
            </div>
        </div>
        </div>
    </div>
    </div>
    
    <div class="clearfix"></div>
</div>

<!--special-offer-->
<div class="container special-offer padd-80">
    <div class="row">
            <div class="col-md-4  offer-sale text-center">
                <h3>special-offers</h3>
                <div class="offer">
                    <div class="offer-circle">
                        <p>Save</p>
                        <p> DH 50</p>
                    </div>
                    <div class="clearfix"></div>
                    <img src="{{ asset('img/offer-speaker.jpg') }}" alt="" class="img-responsive" />
                    <h2><a href="#">Creative WP-350 Wireless Bluetooth® Headphones with Mic</a></h2>
                    <div class="price product-body sale">
                        <h4>95.50 DH </h4>
                        <h5> DH 120.20</h5>
                    </div>
                    <div class="price-range">
                                <p class="price-range-title-left">Already Sold:<span>105</span></p>
                                <p class="price-range-title-right">Availbale:<span>42</span></p>
                                
                                <div class="clearfix"></div>
                    </div>
                    <div class="pro-bar">
                        <div class="pro-bg"></div>
                        <div class="pro-fg"></div>
                    </div>
                    
                    <div id="timer-2" class="text-center">
                        <h2>Hurry up! Offer ends in:</h2>
                        <div class="col-sm-3 col-xs-6">
                              <div id="days1"></div>
                            <p>Days</p>
                      </div>
                      <div class="col-sm-3 col-xs-6">
                              <div id="hours1"></div>
                            <p>Hours</p>
                      </div>
                      <div class="col-sm-3 col-xs-6">
                              <div id="minutes1"></div>
                            <p>Minutes</p>
                      </div>
                      <div class="col-sm-3 col-xs-6">
                              <div id="seconds1"></div>
                            <p>Seconds</p>
                      </div>
                      <div class="clearfix"></div>
               </div>
                   </div>       
            </div>
            
            <div class="col-md-8">
                 <div class="tab-style">
                  
                  <div class="tab">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">Featured</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">On Sale</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Top Rated</a></li>
                        <li role="presentation"><a href="#onsale" aria-controls="onsale" role="tab" data-toggle="tab">Popular</a></li>
                        <li role="presentation"><a href="#trending" aria-controls="trending" role="tab" data-toggle="tab">Trending</a></li>
                        <li role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Latest</a></li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
            
                  
                  <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home1">
                
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount out-stock">Out of stock</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="offer-discount">-15%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="clearfix"></div>
                
                        </div>
                
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                        
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="offer-discount">-15%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="clearfix"></div>
                        
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="messages">
                        
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="offer-discount">-15%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="clearfix"></div>
                                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="onsale">
                        
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="offer-discount">-15%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="clearfix"></div>
                        
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="trending">
                        
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="offer-discount">-15%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="clearfix"></div>
                        
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="popular">
                        
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="offer-discount">-15%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="clearfix"></div>
                        
                        </div>
                        
                    </div>
            
                </div>
            </div>
            
            <div class="clearfix"></div>
    </div>       
    </div>
    <!--best-seller-->
<div class="container-fluid best-seller padd-80">
    <div class="container best-product">
    <div class="tab-style">
    <div class="tab-structure">
      <h3>Best Sellers</h3>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#deals" aria-controls="deals" role="tab" data-toggle="tab">Best Deals </a></li>
        <li role="presentation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">TV & Audio </a></li>
        <li role="presentation"><a href="#cameras" aria-controls="cameras" role="tab" data-toggle="tab">Cameras </a></li>
        <li role="presentation"><a href="#smartphones" aria-controls="smartphones" role="tab" data-toggle="tab">Smartphones</a></li>
        <li role="presentation"><a href="#computers" aria-controls="computers" role="tab" data-toggle="tab">Computers </a></li>
        <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
      </ul>
      <div class="clearfix"></div>
      
    </div>
    <div class="tab-content">
    
            <div role="tabpanel" class="tab-pane fade in active" id="deals">
            <div class="col-md-12 best-deals">
                
                 <div class="col-md-6 mt-30 product">
                    <div class="seller text-center">
                        <div class="offer-circle">
                            <p>Save</p>
                         <p> DH 150</p>
                        </div>
                        
                        <div class="best-phone">
                            
                                <div class="product-detail text-center">
                                
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    <li data-thumb="{{ asset('img//small-1.jpg') }}"> 
                                        <img src="{{ asset('img//best-deala.phone.jpg') }}" alt="" class="img-responsive" />
                                    </li>
                                    <li data-thumb="{{ asset('img//small-3.jpg') }}"> 
                                        <img src="{{ asset('img//sld-3.png') }}" alt="" class="img-responsive" />
                                    </li>
                                    <li data-thumb="{{ asset('img//small-5.jpg') }}"> 
                                        <img src="{{ asset('img//sld-5.png ') }}" class="img-responsive" alt="" />
                                    </li>
                                   
                                </ul>
                                </div>
                            
                                <p class="text-left"><a href="#">iPhone 6s rose gold 126GB</a></p>
                                <h4 class="text-left">595.50 DH </h4>
                                <h5 class="text-left"> DH 720.20</h5>
                                  
                                <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                <div class="clearfix"></div>  
                        </div>
                    </div>	
                </div>
                
                <div class="col-md-6 computer">
                
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple Smart Watch white Colour</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Beats Studio Wireless Over-Ear Headphone</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>                
                    <div class="clearfix"></div>
                </div>
            </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="audio">
            <div class="col-md-12 best-deals">
            
                <div class="col-md-6 mt-30 product">
                    <div class="seller text-center">
                        <div class="offer-circle">
                            <p>Save</p>
                         <p> DH 150</p>
                        </div>
                        
                        <div class="best-phone">
                            <img src="{{ asset('img//best-deala.phone.jpg') }}" alt="" class="img-responsive" />
                                <p class="text-left">iPhone 6s rose gold 126GB</p>
                                <span class="text-left">Electonics</span>
                                <h4 class="text-left">595.50 DH </h4>
                                <h5 class="text-left"> DH 720.20</h5>
                                
                                <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>	
                </div>
                
                <div class="col-md-6 computer">
                
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple Smart Watch white Colour</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Beats Studio Wireless Over-Ear Headphone</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>                
                    <div class="clearfix"></div>
                </div>
                
            </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="cameras">
            <div class="col-md-12 best-deals">
            
                <div class="col-md-6 mt-30 product">
                    <div class="seller text-center">
                        <div class="offer-circle">
                            <p>Save</p>
                         <p> DH 150</p>
                        </div>
                        
                        <div class="best-phone">
                            <img src="{{ asset('img//best-deala.phone.jpg') }}" alt="" class="img-responsive" />
                                <p class="text-left">iPhone 6s rose gold 126GB</p>
                                <span class="text-left">Electonics</span>
                                <h4 class="text-left">595.50 DH </h4>
                                <h5 class="text-left"> DH 720.20</h5>
                                
                                <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>	
                </div>
                
                <div class="col-md-6 computer">
                
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple Smart Watch white Colour</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Beats Studio Wireless Over-Ear Headphone</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>                
                    <div class="clearfix"></div>
                </div>
                
            </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="smartphones">
            <div class="col-md-12 best-deals">
            
                <div class="col-md-6 mt-30 product">
                    <div class="seller text-center">
                        <div class="offer-circle">
                            <p>Save</p>
                         <p> DH 150</p>
                        </div>
                        
                        <div class="best-phone">
                            <img src="{{ asset('img//best-deala.phone.jpg') }}" alt="" class="img-responsive" />
                                <p class="text-left">iPhone 6s rose gold 126GB</p>
                                <span class="text-left">Electonics</span>
                                <h4 class="text-left">595.50 DH </h4>
                                <h5 class="text-left"> DH 720.20</h5>
                                
                                <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>	
                </div>
                
                <div class="col-md-6 computer">
                
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple Smart Watch white Colour</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Beats Studio Wireless Over-Ear Headphone</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>                
                    <div class="clearfix"></div>
                </div>
                
            </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="computers">
            <div class="col-md-12 best-deals">
            
                <div class="col-md-6 mt-30 product">
                    <div class="seller text-center">
                        <div class="offer-circle">
                            <p>Save</p>
                         <p> DH 150</p>
                        </div>
                        
                        <div class="best-phone">
                            <img src="{{ asset('img//best-deala.phone.jpg') }}" alt="" class="img-responsive" />
                                <p class="text-left">iPhone 6s rose gold 126GB</p>
                                <span class="text-left">Electonics</span>
                                <h4 class="text-left">595.50 DH </h4>
                                <h5 class="text-left"> DH 720.20</h5>
                                
                                <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>	
                </div>
                
                <div class="col-md-6 computer">
                
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple Smart Watch white Colour</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Beats Studio Wireless Over-Ear Headphone</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>                
                    <div class="clearfix"></div>
                </div>
                
            </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="accessories">
            <div class="col-md-12 best-deals">
            
                <div class="col-md-6 mt-30 product">
                    <div class="seller text-center">
                        <div class="offer-circle">
                            <p>Save</p>
                         <p> DH 150</p>
                        </div>
                        
                        <div class="best-phone">
                            <img src="{{ asset('img//best-deala.phone.jpg') }}" alt="" class="img-responsive" />
                                <p class="text-left">iPhone 6s rose gold 126GB</p>
                                <span class="text-left">Electonics</span>
                                <h4 class="text-left">595.50 DH </h4>
                                <h5 class="text-left"> DH 720.20</h5>
                                
                                <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>	
                </div>
                
                <div class="col-md-6 computer">
                
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Apple Smart Watch white Colour</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>        
                            
                    <div class="col-md-6 col-sm-6 mt-30">
                            <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img//best-seller-headphone.jpg') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img//best-seller-watch.jpg') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Beats Studio Wireless Over-Ear Headphone</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>                
                    <div class="clearfix"></div>
                </div>
                
            </div>
            </div>
            
      </div>
    
      
    </div>    
    </div>
    </div>
    
    <!--featured-product-->
    <div class="container featured-product product-sec padd-80">
        <div class="col-md-4 col-sm-4 ban-sec"><a href="#"><img src="{{ asset('img//img-1.jpg') }}" alt="" class="img-responsive" /></a></div>
        <div class="col-md-4 col-sm-4 ban-sec"><a href="#"><img src="{{ asset('img//img-2.jpg') }}" alt="" class="img-responsive" /></a></div>
        <div class="col-md-4 col-sm-4 ban-sec"><a href="#"><img src="{{ asset('img//img-3.jpg') }}" alt="" class="img-responsive" /></a></div>
        <div class="col-md-8 col-sm-8 ban-sec mt-30"><a href="#"><img src="{{ asset('img//img-4.jpg') }}" alt="" class="img-responsive" /></a></div>
    </div>
        
    <!--most-popular-product-->
    <div class="container product-slider">
        <div class="col-md-3">
            <h3>Most Populer Products</h3>
            <p>Lorem ipsum dolor sit amet, conse tetur adipiscing elit. </p>
            <a href="#" class="bg-btn">View all</a>
        </div>
        <div class="tranding col-md-9">
                <div class="owl-carousel special-offer" id="blog">
            
                  <div class="thumbnail no-border no-padding">
                      <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/laptop.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>      
                  </div>
                  
                  <div class="thumbnail no-border no-padding">
                      <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/mobile.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/speaker.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount">-25%</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>      
                  </div>
                 
                  <div class="thumbnail no-border no-padding">
                      <div class="product">
                            
                                <div class="product-img">
                                    <a href="#" class="product-href"></a>
                                    <img src="{{ asset('img/camera.png') }}" alt="" class="img-responsive img-overlay" />
                                    <img src="{{ asset('img/refrigetor.png') }}" alt="" class="img-responsive" />
                                    <div class="offer-discount new">New</div>
                                    <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                                </div>
                                <div class="product-body">
                                    <p><a href="#">Samsung RFG23 Classic Style</a></p>
                                    <h4>595.50 DH </h4>
                                    <div class="product-hover">
                                        <div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                        <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>      
                  </div>
                         
                </div>
              </div>
    </div>
    
    <!--discount-->
    <div class="container-fluid discount-sec">
    <div class="container discount-ban">
        <div class="col-md-12 discount"><a href="#"><img src="{{ asset('img//banner.png') }}" class="img-responsive" alt="" /></a></div>
    </div>
    </div>
    
    <!--join-to-instagram-->
    <div class="container joininsta-sec padd-80">
    
        <div class="col-md-7 insta-world">
            <div class="col-md-6 col-sm-6 insta-img">
                <div class="tag-people tag-photo">
                    <img src="{{ asset('img//insta-2.jpg') }}" alt="" class="img-responsive" />
                    <div class="insta-people">
                        <img src="{{ asset('img//insta-2.png') }}" alt="" />
                        <h5>Lucius_cashmere</h5>
                    </div>
                </div>
                
                <div class="tag-people">
                    <img src="{{ asset('img//insta-3.jpg') }}" alt="" class="img-responsive mt-10" />
                    <div class="insta-people">
                        <img src="{{ asset('img//insta-3.png') }}" alt="" />
                        <h5>Aliciapurple01</h5>
                    </div>
                </div>
                
            </div> 
            
            <div class="col-md-6 col-sm-6 instaworld insta-img">
                <div class="insta-body">
                    <div class="quote"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                        <p>We totally love you <span>#swiss!</span></p>
                        <div class="insta-name">
                            <img src="{{ asset('img//insta-4.png') }}" alt="" class="img-responsive" />
                            <h2>Samuel001</h2>
                        </div>
                </div>
                
                <div class="tag-people">
                    <img src="{{ asset('img//insta-1.jpg') }}" alt="" class="img-responsive" />
                    <div class="insta-people">
                        <img src="{{ asset('img//insta-1.png') }}" alt="" />
                        <h5>Alcohol500</h5>
                    </div>
                </div>
                
            </div>
            
            <p class="has-tag">#</p>
            
        </div>
        <div class="col-md-4 col-md-offset-1 join-insta">
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <h3>Join our <span>#instaworld</span></h3>
            <span>Share your happiness.</span>
            <p>Tag your instagram posts wth #swiss and show us the things you love!</p>
            <a href="#" class="btn-insta">Follow instagram</a>
        </div>
    </div>
       
    <!--top-rated-product-->
    <div class="container top-rated">
    
        <div class="col-md-4 col-sm-6 top-rated-product pt-60">
            <h3><a href="#">Featured Product</a></h3>
            <span></span>
            <div class="tranding">
                <div class="owl-carousel special-offer" id="topproduct">
            
                  <div class="thumbnail no-border no-padding">
                         <div class="popular-product col-xs-12 sale col-md-12">
                <a href="#"><img src="{{ asset('img/top_product_phone.jpg') }}" alt="" class="img-responsive" /></a>        
                <h2><a href="#">iPhone 6s rose gold 126GB</a></h2>
                <h4>750.50 DH </h4> 
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 sale col-md-12">
                            <a href="#"><img src="{{ asset('img/watch.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">iWatch Apple</a></h2>
                            <h4>700.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/otg.jpg') }}" alt="" class="img-responsive"></a>
                            <h2><a href="#">PQi iConnect USB OTG </a></h2>
                            <h4>700.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>   
                  </div>
                  
                  <div class="thumbnail no-border no-padding">
                        <div class="popular-product col-xs-12 col-md-12 sale">
                <a href="#"><img src="{{ asset('img/top_product_fridge.jpg') }}" alt="" class="img-responsive" /></a>
                <h2><a href="#">SAMSUNG RFG23UERS</a> </h2>
                <h4>750.50 DH </h4>
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale">
                            <a href="#"><img src="{{ asset('img/top_product_laptop.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">HP Stream 14" Laptop</a></h2>
                            <h4>650.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/top_product_speaker.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Home Theater System</a></h2>
                            <h4>570.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div> 
                  </div>
                 
                  <div class="thumbnail no-border no-padding">
                        <div class="popular-product col-xs-12 col-md-12 sale">
                <a href="#"><img src="{{ asset('img/top_product_camera.jpg') }}" alt="" class="img-responsive" /></a>
                <h2><a href="#">OLYMPUS Stylus TG-5</a> </h2>
                <h4>755.50 DH </h4>
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale">
                            <a href="#"><img src="{{ asset('img/top_product_cell-phone.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Samsung Galaxy S8</a> </h2>
                            <h4>580.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/top_product_tv.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Sony KDL43W7 43"(108cm)</a></h2>
                            <h4>540.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class=" clearfix"></div>
                  </div>
                         
                </div>
              </div>    
        </div>
    
        <div class="col-md-4 col-sm-6 top-rated-product pt-60">
        <h3><a href="#">Top Rated</a></h3>
            <span></span>
            <div class="tranding">
                <div class="owl-carousel special-offer" id="featureproduct">
            
                  <div class="thumbnail no-border no-padding">
                          
                         <div class="popular-product col-xs-12 col-md-12 sale">
                <a href="#"><img src="{{ asset('img/top_product_fridge.jpg') }}" alt="" class="img-responsive" /></a>
                <h2><a href="#">SAMSUNG RFG23UERS</a> </h2>
                <h4>750.50 DH </h4>
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale">
                            <a href="#"><img src="{{ asset('img/top_product_laptop.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">HP Stream 14" Laptop</a></h2>
                            <h4>650.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/top_product_speaker.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Home Theater System</a></h2>
                            <h4>570.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                  </div>
                  
                  <div class="thumbnail no-border no-padding">
                  
                         <div class="popular-product col-xs-12 sale col-md-12">
                <a href="#"><img src="{{ asset('img/top_product_phone.jpg') }}" alt="" class="img-responsive" /></a>        
                <h2><a href="#">iPhone 6s rose gold 126GB</a></h2>
                <h4>750.50 DH </h4> 
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 sale col-md-12">
                            <a href="#"><img src="{{ asset('img/watch.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">iWatch Apple</a></h2>
                            <h4>700.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/otg.jpg') }}" alt="" class="img-responsive"></a>
                            <h2><a href="#">PQi iConnect USB OTG </a></h2>
                            <h4>700.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                  </div>
                 
                  <div class="thumbnail no-border no-padding">
                        <div class="popular-product col-xs-12 col-md-12 sale">
                <a href="#"><img src="{{ asset('img/top_product_camera.jpg') }}" alt="" class="img-responsive" /></a>
                <h2><a href="#">OLYMPUS Stylus TG-5</a> </h2>
                <h4>755.50 DH </h4>
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale">
                            <a href="#"><img src="{{ asset('img/top_product_cell-phone.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Samsung Galaxy S8</a> </h2>
                            <h4>580.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/top_product_tv.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Sony KDL43W7 43"(108cm)</a></h2>
                            <h4>540.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class=" clearfix"></div>
                  </div>
                         
                </div>
              </div>
        </div>
        
        <div class="col-sm-6 col-md-offset-0 col-md-4  top-rated-product pt-60 pb-60">
            <h3><a href="#">Popular Products</a></h3>
            <span></span>
            <div class="tranding">
                <div class="owl-carousel special-offer" id="popularproduct">
                
                  <div class="thumbnail no-border no-padding">
                            <div class="popular-product col-xs-12 col-md-12 sale">
                    <a href="#"><img src="{{ asset('img/top_product_camera.jpg') }}" alt="" class="img-responsive" /></a>
                    <h2><a href="#">OLYMPUS Stylus TG-5</a> </h2>
                    <h4>755.50 DH </h4>
                    
                    <div class="hover-product">
                        <div class="hover-product-body">
                        <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                        <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                        <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                        </div>
                    </div>
                    
                </div>
                            <div class="clearfix"></div>
                            
                            <div class="popular-product col-xs-12 col-md-12 sale">
                                <a href="#"><img src="{{ asset('img/top_product_cell-phone.jpg') }}" alt="" class="img-responsive" /></a>
                                <h2><a href="#">Samsung Galaxy S8</a> </h2>
                                <h4>580.50 DH </h4>
                                
                                <div class="hover-product">
                                    <div class="hover-product-body">
                                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="popular-product col-xs-12 col-md-12 sale connect">
                                <a href="#"><img src="{{ asset('img/top_product_tv.jpg') }}" alt="" class="img-responsive" /></a>
                                <h2><a href="#">Sony KDL43W7 43"(108cm)</a></h2>
                                <h4>540.50 DH </h4>
                                
                                <div class="hover-product">
                                    <div class="hover-product-body">
                                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class=" clearfix"></div>
                  </div>
            
                  <div class="thumbnail no-border no-padding">
                          
                         <div class="popular-product col-xs-12 col-md-12 sale">
                <a href="#"><img src="{{ asset('img/top_product_fridge.jpg') }}" alt="" class="img-responsive" /></a>
                <h2><a href="#">SAMSUNG RFG23UERS</a> </h2>
                <h4>750.50 DH </h4>
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale">
                            <a href="#"><img src="{{ asset('img/top_product_laptop.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">HP Stream 14" Laptop</a></h2>
                            <h4>650.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/top_product_speaker.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">Home Theater System</a></h2>
                            <h4>570.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                  </div>
                  
                  <div class="thumbnail no-border no-padding">
                  
                         <div class="popular-product col-xs-12 sale col-md-12">
                <a href="#"><img src="img/inner-page/top_product_phone.jpg') }}" alt="" class="img-responsive" /></a>        
                <h2><a href="#">iPhone 6s rose gold 126GB</a></h2>
                <h4>750.50 DH </h4> 
                
                <div class="hover-product">
                    <div class="hover-product-body">
                    <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                    <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                    <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                    </div>
                </div>
                
            </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 sale col-md-12">
                            <a href="#"><img src="{{ asset('img/watch.jpg') }}" alt="" class="img-responsive" /></a>
                            <h2><a href="#">iWatch Apple</a></h2>
                            <h4>700.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="popular-product col-xs-12 col-md-12 sale connect">
                            <a href="#"><img src="{{ asset('img/otg.jpg') }}" alt="" class="img-responsive"></a>
                            <h2><a href="#">PQi iConnect USB OTG </a></h2>
                            <h4>700.50 DH </h4>
                            
                            <div class="hover-product">
                                <div class="hover-product-body">
                                <div class="hover-icon heart"><a href="#"><i class="flaticon-heart"></i></a></div>
                                <div class="hover-icon"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="flaticon-4-search"></i></a></div>
                                <div class="hover-icon"><a href="#"><i class="flaticon-3-signs"></i></a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    
    <!--client-slider-->
    <div class="container client-sec">
        <h2>DISCOVER OUR BRAND</h2>
      <ul id="flexiselDemo3">
            <li><img src="img/brand/img-1.jpg') }}" alt="" /></li>
            <li><img src="img/brand/img-2.jpg') }}" alt="" /></li> 
            <li><img src="img/brand/img-3.jpg') }}" alt="" /></li>
            <li><img src="img/brand/img-4.jpg') }}" alt="" /></li> 
            <li><img src="img/brand/img-5.jpg') }}" alt="" /></li>                                            
        </ul>
        <div class="clearfix"></div>
        
    </div>
    
    <!--newsletter-->
    <div class="container-fluid news-letter">
    <div class="container padd-40">
        <div class="col-md-4 col-sm-6 letter">
            <i class="flaticon-newsletter"></i>
            <p>Sign up to</p>
            <h2>Newsletter</h2>
        </div>
        <div class="col-md-3 col-sm-6 sign-news">
            <p>Sign up our newsletter and receive 
                 DH 20 coupon for first shopping</p>
        </div>
        <div class="col-md-5 email-address">
            <input type="email" name="email" placeholder="Enter your email address" />
            <div class="round">
            <a href="#"><i class="flaticon-paper-plane"></i></a>
            </div>
        </div>
    </div>
    </div>
    
    <!--footer-->
    <div class="container-fluid footer-sec">
    <div class="container padd-60">
        <div class="col-md-12 footer-top-sec">
            <div class="col-md-4 col-sm-5 payment">
                <img src="img/footer/paypal.png') }}" alt="" class="img-responsive" />
                <img src="img/footer/visa.png') }}" alt="" class="img-responsive" />
                <img src="img/footer/mastercard.png') }}" alt="" class="img-responsive" />
            </div>
            <div class="col-md-4 col-sm-2 footer-logo"><img src="{{ asset('img//logo.png') }}" alt="" class="img-responsive" /></div>
            <div class="col-md-4 col-sm-5 social-sec text-center">
            <div class="social">
                <div class="social-circle"><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></div>
                <div class="social-circle"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                <div class="social-circle"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                <div class="social-circle"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></div>
            </div>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="col-md-12 call">
            <h3>CONTACT INFORMATION</h3>
            <div class="col-md-4 col-sm-4 email">
                <i class="flaticon-phone-call"></i>
                <h3>CALL</h3>
                <p>+01 (9876) 543 210</p>
                <p>+01 (9876) 543 211</p>
            </div>
            <div class="col-md-4 col-sm-4 email">
                <i class="flaticon-placeholder-1"></i>
                <h3>FIND US</h3>
                <p>Hahnenmoos strasse 20C, 3715</p>
                <p> Adelboden, Switzerland</p>
            </div>
            <div class="col-md-4 col-sm-4 email">
                <i class="flaticon-e-mail-envelope"></i>
                <h3>EMAIL</h3>
                <p>Info@grabyshop.com</p>
                <p>contact@grabyshop.com</p>
            </div>
        </div>
    </div>
    </div>
    
    <div class="container-fluid copy-right">
        <div class="container">
            <div class="col-md-4 col-sm-3 copy-text">
                <p>© 2018 <a href="#">BAB Casa</a>.</p>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-9 terms-condition text-right">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Legal information</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Term of service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    </div>
    
    <!--modal-->
    <div class="modal fade quick-modal in" id="quick-modal" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="col-md-5 detail-left text-center">
                                <ul class="color-var">
                                    <li><a href="#"><i class="fa fa-check"></i></a></li>
                                    <li><a href="#" class="active"><i class="fa fa-check"></i></a></li>
                                    <li><a href="#"><i class="fa fa-check"></i></a></li>
                                    <li><a href="#"><i class="fa fa-check"></i></a></li>
                                    <li><a href="#"><i class="fa fa-check"></i></a></li>
                                </ul>
                                <div id="carousel" class="carousel slide" data-ride="carousel">
                                  <div class="carousel-inner">
                                    <div class="item active" data-thumb="0"> <img src="img/product-list/quick-img-1.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="1"> <img src="img/product-list/quick-img-2.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="2"> <img src="img/product-list/quick-img-3.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="3"> <img src="img/product-list/quick-img-4.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="4"> <img src="img/product-list/quick-img-1.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="5"> <img src="img/product-list/quick-img-2.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="6"> <img src="img/product-list/quick-img-3.jpg') }}" alt=""> </div>
                                    <div class="item" data-thumb="7"> <img src="img/product-list/quick-img-4.jpg') }}" alt=""> </div>
                                  </div>
                                </div>
                                <div id="thumbcarousel" class="carousel thumbcarousel slide" data-interval="false">
                                  <div class="carousel-inner">
                                    <div class="item active">
                                      <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="img/product-list/thumb-img-1.jpg') }}" alt=""></div>
                                      <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="img/product-list/thumb-img-2.jpg') }}" alt=""></div>
                                      <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="img/product-list/thumb-img-3.jpg') }}" alt=""></div>
                                      <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="img/product-list/thumb-img-4.jpg') }}" alt=""></div>
                                    </div>
                                    <!-- /item -->
                                    <div class="item">
                                      <div data-target="#carousel" data-slide-to="4" class="thumb"><img src="img/product-list/thumb-img-1.jpg') }}" alt=""></div>
                                      <div data-target="#carousel" data-slide-to="5" class="thumb"><img src="img/product-list/thumb-img-2.jpg') }}" alt=""></div>
                                      <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="img/product-list/thumb-img-3.jpg') }}" alt=""></div>
                                      <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="img/product-list/thumb-img-4.jpg') }}" alt=""></div>
                                    </div>
                                    <!-- /item --> 
                                  </div>
                                  <!-- /carousel-inner --> 
                                  <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <span class="fa fa-angle-left"></span> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"> <span class="fa fa-angle-right"></span> </a> </div>
                            <div class="clearfix"></div>
                            </div>
        
                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>iPhone 7 128GB Rose Gold </h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <span>( 12 reviews )</span>
                                            <a href="#">Write a review</a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">
                                            <h2>495.50 DH  <del> DH 520.20</del></h2>
                                            <label class="offer-label">-15%</label>
                                            <span><i class="fa fa-check-circle"></i> In stock</span>
                                            <div class="clearfix"></div>
                                        </div>            
                                    </div>
                                    <ul class="detail">
                                            <li class="sub-menu"><a class="main-a" href="javascript:void(0)">Description <div class="icon-plus"><i class="fa flaticon-3-signs"></i></div></a>
                                            
                                                <ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcorper risus consectetur id. </p>
                                                </ul>
                                            
                                            </li>
                                    </ul>
                                    <ul class="detail feature">
                                            <li class="sub-menu"><a class="main-a" href="javascript:void(0)">Features <div class="icon-plus"><i class="fa flaticon-3-signs"></i></div></a>
                                            
                                                <ul>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>12MP primary camera </li>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>Quad-LED True Tone flash</li>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>7MP front facing HD camera </li>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>4.7-inch (diagonal) Retina HD</li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>128GB internal memoryVestib</li>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>single Nano-SIM </li>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>Li-Ion 1960 mAh battery</li>
                                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>1 year manufacturer warranty</li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            
                                            </li>
                                    </ul>
                                    <div class="detail-btm">
                                        <div class="detail-row">
                                            <p class="text-uppercase">Size</p>
                                            <ul class="size">
                                                <li><a href="#">32 GB</a></li>
                                                <li><a href="#">64 GB</a></li>
                                                <li class="active"><a href="#">128 GB</a></li>
                                            </ul>
                                        </div>
                                        <div class="detail-row quantity-box">
                                            <p class="text-uppercase">Quantity</p><div class="clearfix"></div>
                                            <div id="field1" class="input--filled">
                                              <button type="button" id="sub" class="sub"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                              <input type="text" id="1" value="1" class="field">
                                              <button type="button" id="add" class="add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                              <div class="clearfix"></div>
                                            </div>
                                            <a class="coupon" href="#">Add to cart</a>
                                            <div class="action-icon pull-right">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>Wish list</a>
                                                <a href="#"><i class="flaticon-refresh"></i>Compare</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="detail-row"><p><span>SKU:</span> N/A</p></div>
                                        <div class="detail-row"><p><span>Categories:</span> All, Featured, Shoes</p></div>
                                        <div class="detail-row"><p><span>Tags:</span> Black, Brown, Red, Shoes, £0.00 - £150.00</p></div>
                                        <div class="detail-row">
                                            <p><span>Share:</span></p>
                                            <div class="soc-icon">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook-f"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribble"><i class="fa fa-dribbble"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest-p"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
    <!--page-load-modal-->                
    <div class="modal page-modal fade" id="pageloadmodal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="col-sm-5">
                <img src="{{ asset('img//page-modal-img.jpg') }}" alt="" class="img-responsive" />
            </div>
            <div class="col-sm-7">
                <h2>Sign up our newsletter and save 25% off for the next purchase!</h2>
                <p>Subscribe and get modified at first on the latest update and offers</p>
                <div class="email-input">
                <input class="email" type="email" name="email" placeholder="Email address" required />
                <span class="input-hover"></span>
                </div>
                <a href="#" class="btn-insta">SEND</a>
                <span>Note: We do not spam</span>  
                <div class="privacy-sec">
                     <input id="7" type="checkbox" /><label for="7">Do not show it anymore</label>
                </div>         
                <div class="clearfix"></div>
            </div>
            
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
</div>
@endsection