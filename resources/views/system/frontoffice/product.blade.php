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

    <!--main-->
<div class="container product-information padd-80">
	
    <div class="col-md-5 col-lg-6 detail-left text-center">
    	<div class="new-label">New</div>
    	<ul class="color-var">
            <li><a href="#"><i class="fa fa-check"></i></a></li>
            <li><a href="#" class="active"><i class="fa fa-check"></i></a></li>
            <li><a href="#"><i class="fa fa-check"></i></a></li>
            <li><a href="#"><i class="fa fa-check"></i></a></li>
            <li><a href="#"><i class="fa fa-check"></i></a></li>
    	</ul>
        <a href="#" data-toggle="modal" data-target="#myModal-" class="zoom-btn"><i class="fa fa-search-plus"></i></a>
    	<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                    <li data-thumb="{{ asset('img//small-1.jpg') }}"> 
                        <img src="{{ asset('img//sld-1.png') }}" class="img-responsive" alt="" />                       
                    </li>
                    <li data-thumb="{{ asset('img//small-2.jpg') }}"> 
                        <img src="{{ asset('img//sld-1.png') }}" class="img-responsive" alt="" />
                    </li>
                    <li data-thumb="{{ asset('img//small-3.jpg') }}"> 
                        <img src="{{ asset('img//sld-3.png') }}" class="img-responsive" alt="" />
                    </li>
                    <li data-thumb="{{ asset('img//small-4.jpg') }}"> 
                        <img src="{{ asset('img//sld-1.png') }}" class="img-responsive" alt="" />
                    </li>
                    <li data-thumb="{{ asset('img//small-5.jpg') }}"> 
                        <img src="{{ asset('img//sld-5.png') }}" class="img-responsive" alt="" />
                    </li>
                </ul>
        <div class="clearfix"></div>
        
        <!--Modal-->
        <div class="modal fade bs-example-modal-lg" id="myModal-" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">iPhone 7 128GB Rose Gold</h4>
              </div>
              <div class="modal-body">
                	
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                    
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active text-center">
                          <img src="{{ asset('img//sld-1.png') }}" alt="...">
                        </div>
                        <div class="item text-center">
                          <img src="{{ asset('img//sld-3.png') }}" alt="...">
                        </div>
                        <div class="item text-center">
                          <img src="{{ asset('img//sld-5.png') }}" alt="...">
                        </div>
                      </div>
                    
                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><img src="{{ asset('img//small-1.jpg') }}" alt="" /></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"><img src="{{ asset('img//small-3.jpg') }}" alt="" /></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"><img src="{{ asset('img//small-5.jpg') }}" alt="" /></li>
                      </ol>
                      
                    </div>
                    
              </div>
              <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>-->
            </div>
          </div>
        </div>
        
    </div>
    
    <div class="col-md-7 col-lg-6 detail-right">
    	<div class="detail-top">
        	<h1>iPhone 7 128GB Rose Gold </h1>
            <h6>Electonics</h6>
            <div class="rating">
            	<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                <span>( 12 reviews )</span>
                <a href="#">Write a review</a>
                <div class="clearfix"></div>
            </div>
            <div class="rate">
            	<h2>495.50$ <del>$520.20</del></h2>
                <label class="offer-label">-15%</label>
                <span><i class="fa fa-check-circle"></i> In stock</span>
                <div class="clearfix"></div>
            </div>            
        </div>
        <ul class="detail">
                <li class="sub-menu"><a class="main-a" href="javascript:void(0)">Description <i class="fa fa-angle-down"></i></a>
                
                    <ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcorper risus consectetur id. </p>
                    </ul>
                
                </li>
        </ul>
        <ul class="detail feature">
                <li class="sub-menu"><a class="main-a" href="javascript:void(0)">Features <i class="fa fa-angle-down"></i></a>
                
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
                <div class="input--filled">
                  <button type="button" class="sub"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  <input type="text" value="1" class="field">
                  <button type="button" class="add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                  <div class="clearfix"></div>
        		</div>
                <a class="coupon" href="#">Add to cart</a>
                <div class="action-icon pull-right">
                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>Wish list</a>
                    <a href="#"><i class="flaticon-refresh"></i>Compare</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="detail-row"><p><span> SKU: </span>N/A</p></div>
            <div class="detail-row"><p><span>Categories: </span>All, Featured, Shoes</p></div>
            <div class="detail-row"><p><span>Tags: </span>Black, Brown, Red, Shoes, £0.00 - £150.00</p></div>
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
    
    <div class="product-tab">

  	<!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Info</a></li>
        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Delivery</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Returns</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Additional Information</a></li>
      </ul>

      <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade" id="home">
          		<p><b>Standard Shipping:</b> Shipping within 6 business days, $4 - FREE (spend over $40) Orders under $40 may be shipped on an untracked service and may take longer to arrive</p>
                <p><b>4-Day Shipping:</b> $6.00</p>
                <p><b>2-Day Shipping:</b> $12.00 or FREE when you spend $140* </p>
                <p><b>1-Day Shipping:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
                <p><b>Dorem ipsum dolor sit: </b> Amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
          </div>
          <div role="tabpanel" class="tab-pane fade in active" id="profile">
          		<p><b>Standard Shipping:</b> Shipping within 6 business days, $4 - FREE (spend over $40) Orders under $40 may be shipped on an untracked service and may take longer to arrive</p>
                <p><b>4-Day Shipping:</b> $6.00</p>
                <p><b>2-Day Shipping:</b> $12.00 or FREE when you spend $140* </p>
                <p><b>1-Day Shipping:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
                <p><b>Dorem ipsum dolor sit: </b> Amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="messages">
          		<p><b>Standard Shipping:</b> Shipping within 6 business days, $4 - FREE (spend over $40) Orders under $40 may be shipped on an untracked service and may take longer to arrive</p>
                <p><b>4-Day Shipping:</b> $6.00</p>
                <p><b>2-Day Shipping:</b> $12.00 or FREE when you spend $140* </p>
                <p><b>1-Day Shipping:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
                <p><b>Dorem ipsum dolor sit: </b> Amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="settings">
          		<p><b>Standard Shipping:</b> Shipping within 6 business days, $4 - FREE (spend over $40) Orders under $40 may be shipped on an untracked service and may take longer to arrive</p>
                <p><b>4-Day Shipping:</b> $6.00</p>
                <p><b>2-Day Shipping:</b> $12.00 or FREE when you spend $140* </p>
                <p><b>1-Day Shipping:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
                <p><b>Dorem ipsum dolor sit: </b> Amet, consectetur adipiscing elit. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, consectetur adium porttitor egestas orci, vitae ullamcor consectetur id. Vestib porttitor egestas orci, vitae ullamcorper risus  dolor sit amet, </p>
          </div>
        </div>
        
        <div class="clearfix"></div>

	</div>
    
    <div class="slider-head">
    	<h3>Related Products</h3>
    </div>
    
    <div class="tranding mt-30">
        <div class="owl-carousel special-offer" id="productdetail">
    
            <div class="thumbnail no-border no-padding">
            <div class="product">
                    
                        <div class="product-img">
                            <a href="#" class="product-href"></a>
                            <img src="img/product/camera.png" alt="" class="img-responsive img-overlay" />
                            <img src="img/product/refrigetor.png" alt="" class="img-responsive" />
                            <div class="offer-discount new">New</div>
                            <div class="offer-discount">-15%</div>
                            <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                        </div>
                        <div class="product-body">
                            <p><a href="#">Samsung RFG23 Classic Style</a></p>
                            <h4>595.50$</h4>
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
                            <img src="img/product/laptop.png" alt="" class="img-responsive img-overlay" />
                            <img src="img/product/camera.png" alt="" class="img-responsive" />
                            <div class="offer-discount">-25%</div>
                            <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                        </div>
                        <div class="product-body">
                            <p><a href="#">Samsung RFG23 Classic Style</a></p>
                            <h4>595.50$</h4>
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
                            <img src="img/product/camera.png" alt="" class="img-responsive img-overlay" />
                            <img src="img/product/laptop.png" alt="" class="img-responsive" />
                            <div class="offer-discount">-25%</div>
                            <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                        </div>
                        <div class="product-body">
                            <p><a href="#">Samsung RFG23 Classic Style</a></p>
                            <h4>595.50$</h4>
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
                            <img src="img/index/best-seller-otg.jpg') }}" alt="" class="img-responsive img-overlay" />
                            <img src="img/index/best-seller-tablet.jpg') }}" alt="" class="img-responsive" />
                            <div class="offer-discount">-25%</div>
                            <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                        </div>
                        <div class="product-body">
                            <p><a href="#">Samsung RFG23 Classic Style</a></p>
                            <h4>595.50$</h4>
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
                            <img src="img/index/best-seller-tablet.jpg') }}" alt="" class="img-responsive img-overlay" />
                            <img src="img/index/best-seller-otg.jpg') }}" alt="" class="img-responsive" />
                            <div class="offer-discount new">New</div>
                            <div class="sale-heart-hover"><a href="#"><i class="flaticon-heart"></i></a></div>
                        </div>
                        <div class="product-body">
                            <p><a href="#">Apple iPad Tablet Space Grey</a></p>
                            <h4>595.50$</h4>
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
</div>