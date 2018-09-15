@extends('layouts.frontoffice.app')

@section('before_css')
<link href="{{  asset('frontoffice/css/style.css')  }}" rel="stylesheet" type="text/css">

@endsection

@section('body')
<div class="index-new">
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    <header class="border">
        <div class="container header-sec">
            <div class="col-md-12 col-sm-12 header">
                <div class="header-right">
                    <div class="top-bar-list">
                        <a href="#">
                            <p>Buyer protection</p>
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
                <div class="cart-item no-padding">
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


    <!--special-offer-->
<div class="container padd-60 special-offer">           
    
    <div class="col-md-9 grid-list col-md-push-3">
    <div class="product-top-bar">
    	<ul>
        	<li><a href="#" class="show-list">Showing of 1-12 of 125 results</a></li>
        	<li><a href="#"><span>Short by</span></a></li>
        	<li><a href="#">Price</a></li>
        	<li><a href="#">Name</a></li>
        	<li><a href="#">Date</a></li>
        	<li><a href="#">Popular</a></li>
            <div class="pull-right">
            <li><a href="#" class="menu-btn active text-right"><i class="flaticon-1-squares"></i></a></li>
            <li><a href="product-list.html" class="menu-btn text-right"><i class="flaticon-1-menu"></i></a></li>
            </div>
        </ul>
    </div>
    <div class="clearfix"></div>
    
        <div class="col-md-4 col-sm-4">
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
        
        <div class="col-md-4 col-sm-4 phone">
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
        
        <div class="col-md-4 col-sm-4 phone">
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
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
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
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-otg.jpg') }}" alt="" class="img-responsive" />
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
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
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
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/img-1.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                <div class="offer-discount">-25%</div>
                                <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                            </div>
                            <div class="product-body">
                                <p><a href="#">SAMSUNG RFG23UERS Classic Style</a></p>
                                <h4>595.50 DH </h4>
                                <div class="product-hover">
                                	<div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                    <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                </div>
                        	</div>
                            
                        </div>
        </div>
        
        <div class="col-md-4 col-sm-4 sale-on mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
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
        
        <div class="col-md-4 col-sm-4 mt-40">
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
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/best-seller-watch.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
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
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/img-5.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                <div class="offer-discount">-25%</div>
                                <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                            </div>
                            <div class="product-body">
                                <p><a href="#">HP Stream 14" Laptop, Windows 10</a></p>
                                <h4>595.50 DH </h4>
                                <div class="product-hover">
                                	<div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                    <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                </div>
                        	</div>
                            
                        </div>
        </div>
        
        <div class="col-md-4 col-sm-4 mt-40">
        <div class="product">
                        
                        	<div class="product-img">
                            	<a href="#" class="product-href"></a>
                                <img src="{{ asset('img/img-6.jpg') }}" alt="" class="img-responsive img-overlay" />
                                <img src="{{ asset('img/best-seller-headphone.jpg') }}" alt="" class="img-responsive" />
                                <div class="offer-discount">-25%</div>
                                <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                            </div>
                            <div class="product-body">
                                <p><a href="#">Sony KDL43W750D 43"(108cm) FHD LED</a></p>
                                <h4>595.50 DH </h4>
                                <div class="product-hover">
                                	<div class="add-cart-hover"><a href="#"><h6>Add to cart</h6> <i class="flaticon-3-signs" aria-hidden="true"></i></a></div>
                                    <div class="quick-view"><a href="#" data-toggle="modal" data-target="#quick-modal"><i class="fa fa-search-plus" aria-hidden="true"></i></a></div>
                                </div>
                        	</div>
                            
                        </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div class="page-row">
        	<p>Showing of 1-12 of 125 results</p>
            <div class="pull-right">
                <a href="#" class="ne-prev">Prev</a>
                <a href="#" class="no">1</a>
                <a href="#" class="no">2</a>
                <a href="#" class="ne-prev">Next</a>
                <div class="clearfix"></div>
        	</div>
            <div class="clearfix"></div>
        </div>
        
	</div>
    
    <div class="col-md-3 col-md-pull-9 main-side-bar">
    	
     	<ul>
       		<li class="sub-menu"><a class="main-a" href="javascript:void(0)">CATEGORIES <div class="icon-plus"><i class='fa flaticon-3-signs'></i></div></a>
            
            	<ul>
                	<li><a href="#">Cameras, Audio & Video <span>(8)</span></a></li>
                    <li><a href="#">Mobile & Tablets <span>(15)</span></a></li>
                    <li><a href="#">Watches & Eyewear<span>(3)</span></a></li>
                    <li><a href="#">Movies, Music & Games<span>(3)</span></a></li>
                    <li><a href="#">Computers & Accessories <span>(12)</span></a></li>
                    <li><a href="#">TV & Audio <span>(5)</span></a></li>
                    <li><a href="#">Deal of the Day <span>(8)</span></a></li>
                    <li><a href="#">Top 100 Exclusive Offers <span>(4)</span></a></li>
                    <li><a href="#">New Arrivals <span>(8)</span></a></li>
                    <li><a href="#">Health & Beauty <span>(1)</span></a></li>
                </ul>
            
            </li>
       </ul>
       
       	<ul>
       		<li class="sub-menu"><a class="main-a" href="javascript:void(0)">Filter by price <div class="icon-plus"><i class='fa flaticon-3-signs'></i></div></a>
            
            	<ul>
					<div class="price-range">
						<div id="slider-range"></div>
						<div class="clearfix"></div>
						<div class="range-text">
							<h3>Price: <span> DH 1100 to  DH 1850</span></h3>
							<button class="btn-custom">Filter</button>
						</div>
						<div class="clearfix"></div>
					</div>

 

					<!--
					-->
				</ul>
            
            </li>
       </ul>
       
       	<ul class="shop-size">
       		<li class="sub-menu"><a class="main-a" href="javascript:void(0)">Brands <div class="icon-plus"><i class='fa flaticon-3-signs'></i></div></a>
            
            	<ul>
                	<li><input type="checkbox" id="ap" /><label for="ap"> Apple <span>(8)</span></label><div class="clearfix"></div></li>
                    <li><input type="checkbox" id="de" /><label for="de"> Dell <span>(15)</span></label></li>
                    <li><input type="checkbox" id="le" /><label for="le"> Lenovo<span>(3)</span></label></li>
                    <li><input type="checkbox" id="pa" /><label for="pa"> Panasonic<span>(3)</span></label></li>
                    <li><input type="checkbox" id="no" /><label for="no"> Nokia <span>(15)</span></label></li>
                    <li><input type="checkbox" id="sa" /><label for="sa"> Samsung<span>(3)</span></label></li>
                    <li><input type="checkbox" id="zi" /><label for="zi"> Ziox<span>(3)</span></label></li>
                </ul>
            
            </li>
       </ul>
       
       	<ul class="shop-size">
       		<li class="sub-menu"><a class="main-a" href="javascript:void(0)">Shop by color <div class="icon-plus"><i class='fa flaticon-3-signs'></i></div></a>
            
            	<ul>
                	<li><input type="checkbox" id="br" /><label for="br"> Brown <span>(8)</span></label><div class="clearfix"></div></li>
                    <li><input type="checkbox" id="wh" /><label for="wh"> White <span>(15)</span></label></li>
                    <li><input type="checkbox" id="bl" /><label for="bl"> Black<span>(3)</span></label></li>
                    <li><input type="checkbox" id="blu" /><label for="blu"> Blue<span>(3)</span></label></li>
                    <li><input type="checkbox" id="ro" /><label for="ro"> Rosegold <span>(15)</span></label></li>
                    <li><input type="checkbox" id="si" /><label for="si"> Silver<span>(3)</span></label></li>
                    <li><input type="checkbox" id="pi" /><label for="pi"> Pink<span>(3)</span></label></li>
                </ul>
            
            </li>
       </ul>
       
       	<ul class="shop-size">
       		<li class="sub-menu"><a class="main-a" href="javascript:void(0)">Shop by Size <div class="icon-plus"><i class='fa flaticon-3-signs'></i></div></a>
            
            	<ul>
                	<li><input type="checkbox" id="s" /> <label for="s">S <span>(8)</span></label><div class="clearfix"></div></li>
                    <li><input type="checkbox" id="m" /><label for="m">  M <span>(15)</span></label></li>
                    <li><input type="checkbox" id="l" /><label for="l"> L<span>(3)</span></label></li>
                    <li><input type="checkbox" id="xl" /><label for="xl"> XL<span>(3)</span></label></li>
                    <li><input id="xxl" type="checkbox" /><label for="xxl">XXL<span>(15)</span></label></li>
                </ul>
            
            </li>
       </ul>
 
</div>
    
    <div class="clearfix"></div>

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