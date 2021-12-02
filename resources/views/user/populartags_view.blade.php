@extends('user.user_layout')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@php
    $url = Request::url();
    $path = str_replace(' ','-',$url);
    $item = $key;
@endphp
<input type="hidden" id="key" value="{{ $item }}">
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class='row'>
            <div class='col-md-3 sidebar'>
              <!-- ================================== TOP NAVIGATION ================================== -->
              <div class="side-menu animate-dropdown outer-bottom-xs">
                <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                <nav class="yamm megamenu-horizontal">
                  <ul class="nav">
                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>Clothing</a>
                      <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                          <div class="row">
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Shoes </a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Sport Wear</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shorts</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Handbags</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Swimwear </a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Flats</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Winter Wear</a></li>
                                <li><a href="#">Night Suits</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Toys &amp; Games</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">School Bags</a></li>
                                <li><a href="#">Lunch Box</a></li>
                                <li><a href="#">Footwear</a></li>
                                <li><a href="#">Wipes</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Sandals </a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Bags</a></li>
                                <li><a href="#">Night Dress</a></li>
                                <li><a href="#">Swim Wear</a></li>
                                <li><a href="#">Toys</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                      </ul>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a>
                      <!-- ================================== MEGAMENU VERTICAL ================================== -->
                      <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                <li><a href="#">Gaming</a></li>
                                <li><a href="#">Laptop Skins</a></li>
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Dell</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">Microsoft</a></li>
                                <li><a href="#">Asus</a></li>
                                <li><a href="#">Adapters</a></li>
                                <li><a href="#">Batteries</a></li>
                                <li><a href="#">Cooling Pads</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                <li><a href="#">Routers &amp; Modems</a></li>
                                <li><a href="#">CPUs, Processors</a></li>
                                <li><a href="#">PC Gaming Store</a></li>
                                <li><a href="#">Graphics Cards</a></li>
                                <li><a href="#">Components</a></li>
                                <li><a href="#">Webcam</a></li>
                                <li><a href="#">Memory (RAM)</a></li>
                                <li><a href="#">Motherboards</a></li>
                                <li><a href="#">Keyboards</a></li>
                                <li><a href="#">Headphones</a></li>
                              </ul>
                            </div>
                            <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend/images/banners/banner-side.png') }}" ></a> </div>
                          </div>
                          <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                      </ul>
                      <!-- /.dropdown-menu -->
                      <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paw" aria-hidden="true"></i>Shoes</a>
                      <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                          <div class="row">
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Shoes </a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Sport Wear</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shorts</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Handbags</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Swimwear </a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Flats</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Winter Wear</a></li>
                                <li><a href="#">Night Suits</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Toys &amp; Games</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">School Bags</a></li>
                                <li><a href="#">Lunch Box</a></li>
                                <li><a href="#">Footwear</a></li>
                                <li><a href="#">Wipes</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Sandals </a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Bags</a></li>
                                <li><a href="#">Night Dress</a></li>
                                <li><a href="#">Swim Wear</a></li>
                                <li><a href="#">Toys</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                      </ul>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-clock-o"></i>Watches</a>
                      <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                <li><a href="#">Gaming</a></li>
                                <li><a href="#">Laptop Skins</a></li>
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Dell</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">Microsoft</a></li>
                                <li><a href="#">Asus</a></li>
                                <li><a href="#">Adapters</a></li>
                                <li><a href="#">Batteries</a></li>
                                <li><a href="#">Cooling Pads</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                <li><a href="#">Routers &amp; Modems</a></li>
                                <li><a href="#">CPUs, Processors</a></li>
                                <li><a href="#">PC Gaming Store</a></li>
                                <li><a href="#">Graphics Cards</a></li>
                                <li><a href="#">Components</a></li>
                                <li><a href="#">Webcam</a></li>
                                <li><a href="#">Memory (RAM)</a></li>
                                <li><a href="#">Motherboards</a></li>
                                <li><a href="#">Keyboards</a></li>
                                <li><a href="#">Headphones</a></li>
                              </ul>
                            </div>
                            <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend/images/banners/banner-side.png') }}" /></a> </div>
                          </div>
                          <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                      </ul>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-diamond"></i>Jewellery</a>
                      <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                          <div class="row">
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Shoes </a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Sport Wear</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shorts</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Handbags</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Swimwear </a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Flats</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Winter Wear</a></li>
                                <li><a href="#">Night Suits</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Toys &amp; Games</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">School Bags</a></li>
                                <li><a href="#">Lunch Box</a></li>
                                <li><a href="#">Footwear</a></li>
                                <li><a href="#">Wipes</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                <li><a href="#">Sandals </a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Bags</a></li>
                                <li><a href="#">Night Dress</a></li>
                                <li><a href="#">Swim Wear</a></li>
                                <li><a href="#">Toys</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                      </ul>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a>
                      <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                <li><a href="#">Gaming</a></li>
                                <li><a href="#">Laptop Skins</a></li>
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Dell</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">Microsoft</a></li>
                                <li><a href="#">Asus</a></li>
                                <li><a href="#">Adapters</a></li>
                                <li><a href="#">Batteries</a></li>
                                <li><a href="#">Cooling Pads</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                <li><a href="#">Routers &amp; Modems</a></li>
                                <li><a href="#">CPUs, Processors</a></li>
                                <li><a href="#">PC Gaming Store</a></li>
                                <li><a href="#">Graphics Cards</a></li>
                                <li><a href="#">Components</a></li>
                                <li><a href="#">Webcam</a></li>
                                <li><a href="#">Memory (RAM)</a></li>
                                <li><a href="#">Motherboards</a></li>
                                <li><a href="#">Keyboards</a></li>
                                <li><a href="#">Headphones</a></li>
                              </ul>
                            </div>
                            <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend/images/banners/banner-side.png') }}" /></a> </div>
                          </div>
                          <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                      </ul>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                      <!-- ================================== MEGAMENU VERTICAL ================================== -->
                      <!-- /.dropdown-menu -->
                      <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                      <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                  </ul>
                  <!-- /.nav -->
                </nav>
                <!-- /.megamenu-horizontal -->
              </div>
              <!-- /.side-menu -->
              <!-- ================================== TOP NAVIGATION : END ================================== -->
              <div class="sidebar-module-container">
                <div class="sidebar-filter">
                  <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                    <h3 class="section-title">shop by</h3>
                    <div class="widget-header">
                      <h4 class="widget-title">Category</h4>
                    </div>
                    <div class="sidebar-widget-body">
                      <div class="accordion">
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed"> Camera </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner -->
                          </div>
                          <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->

                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed"> Desktops </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner -->
                          </div>
                          <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->

                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed"> Pants </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner -->
                          </div>
                          <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->

                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed"> Bags </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner -->
                          </div>
                          <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->

                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed"> Hats </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner -->
                          </div>
                          <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->

                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed"> Accessories </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner -->
                          </div>
                          <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->

                      </div>
                      <!-- /.accordion -->
                    </div>
                    <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                  <!-- ============================================== PRICE SILDER============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                    <div class="widget-header">
                      <h4 class="widget-title">Price Slider</h4>
                    </div>
                    <div class="sidebar-widget-body m-t-10">
                      <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                        <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                        <input type="text" class="price-slider" value="" >
                      </div>
                      <!-- /.price-range-holder -->
                      <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                    <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== PRICE SILDER : END ============================================== -->
                  <!-- ============================================== MANUFACTURES============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                    <div class="widget-header">
                      <h4 class="widget-title">Manufactures</h4>
                    </div>
                    <div class="sidebar-widget-body">
                      <ul class="list">
                        <li><a href="#">Forever 18</a></li>
                        <li><a href="#">Nike</a></li>
                        <li><a href="#">Dolce & Gabbana</a></li>
                        <li><a href="#">Alluare</a></li>
                        <li><a href="#">Chanel</a></li>
                        <li><a href="#">Other Brand</a></li>
                      </ul>
                      <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                    </div>
                    <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== MANUFACTURES: END ============================================== -->
                  <!-- ============================================== COLOR============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                    <div class="widget-header">
                      <h4 class="widget-title">Colors</h4>
                    </div>
                    <div class="sidebar-widget-body">
                      <ul class="list">
                        <li><a href="#">Red</a></li>
                        <li><a href="#">Blue</a></li>
                        <li><a href="#">Yellow</a></li>
                        <li><a href="#">Pink</a></li>
                        <li><a href="#">Brown</a></li>
                        <li><a href="#">Teal</a></li>
                      </ul>
                    </div>
                    <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== COLOR: END ============================================== -->
                  <!-- ============================================== COMPARE============================================== -->
                  <div class="sidebar-widget wow fadeInUp outer-top-vs">
                    <h3 class="section-title">Compare products</h3>
                    <div class="sidebar-widget-body">
                      <div class="compare-report">
                        <p>You have no <span>item(s)</span> to compare</p>
                      </div>
                      <!-- /.compare-report -->
                    </div>
                    <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== COMPARE: END ============================================== -->
                  <!-- ============================================== PRODUCT TAGS ============================================== -->
                  <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                    <h3 class="section-title">Product tags</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                      <div class="tag-list">
                          @foreach ($slice as $key => $cout)
                            <a class="item {{ $item == $key ? 'active':'' }}" title="Phone" href="{{ route('popular.tags',$key) }}">{{ ucwords($key)." ($cout)" }}</a>
                          @endforeach
                        </div>
                      <!-- /.tag-list -->
                    </div>
                    <!-- /.sidebar-widget-body -->
                  </div>
                  <!-- /.sidebar-widget -->
                <!----------- Testimonials------------->
                  <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                    <div id="advertisement" class="advertisement">
                      <div class="item">
                        <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member1.png') }}" alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">John Doe <span>Abc Company</span> </div>
                        <!-- /.container-fluid -->
                      </div>
                      <!-- /.item -->

                      <div class="item">
                        <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member3.png') }}" alt="Image"></div>
                        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                      </div>
                      <!-- /.item -->

                      <div class="item">
                        <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member2.png') }}" alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                        <!-- /.container-fluid -->
                      </div>
                      <!-- /.item -->

                    </div>
                    <!-- /.owl-carousel -->
                  </div>

                  <!-- ============================================== Testimonials: END ============================================== -->

                  <div class="home-banner"> <img src="{{ asset('frontend//images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
                </div>
                <!-- /.sidebar-filter -->
              </div>
              <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
              <!-- ========================================== SECTION – HERO ========================================= -->

              <div id="category" class="category-carousel hidden-xs">
                <div class="item">
                  <div class="image"> <img src="{{ asset('frontend/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
                  <div class="container-fluid">
                    <div class="caption vertical-top text-left">
                      <div class="big-text"> Big Sale </div>
                      <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                      <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                    </div>
                    <!-- /.caption -->
                  </div>
                  <!-- /.container-fluid -->
                </div>
              </div>


              <div class="clearfix filters-container m-t-10">
                <div class="row">
                  <div class="col col-sm-6 col-md-2">
                    <div class="filter-tabs">
                      <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                        <li class="grid active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                        <li class="list"><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                      </ul>
                    </div>
                    <!-- /.filter-tabs -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-sm-12 col-md-6">
                    <div class="col col-sm-3 col-md-6 no-padding">
                      <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                        <div class="fld inline">
                          <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                            <button data-toggle="dropdown" id="sort_toggle" type="button" class="btn dropdown-toggle"> Default <span id="caret_position" class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu" id="sort">

                                    <li role="presentation"><a>Default</li>
                                    <li role="presentation"><a>Price:Lowest first</li>
                                    <li role="presentation"><a>Price:Highest first</li>
                                    <li role="presentation"><a>Product Name:A to Z</li>

                            </ul>
                          </div>
                        </div>
                        <!-- /.fld -->
                      </div>
                      <!-- /.lbl-cnt -->
                    </div>
                    <!-- /.col -->
                    {{-- <div class="col col-sm-3 col-md-6 no-padding" style="float: right">
                      <div class="lbl-cnt"> <span class="lbl">Show</span>
                        <div class="fld inline">
                          <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                              <li role="presentation"><a href="#">1</a></li>
                              <li role="presentation"><a href="#">2</a></li>
                              <li role="presentation"><a href="#">3</a></li>
                              <li role="presentation"><a href="#">4</a></li>
                              <li role="presentation"><a href="#">5</a></li>
                              <li role="presentation"><a href="#">6</a></li>
                              <li role="presentation"><a href="#">7</a></li>
                              <li role="presentation"><a href="#">8</a></li>
                              <li role="presentation"><a href="#">9</a></li>
                              <li role="presentation"><a href="#">10</a></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /.fld -->
                      </div>
                      <!-- /.lbl-cnt -->
                    </div> --}}
                    <!-- /.col -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-sm-6 col-md-4 text-right">
                    <div class="pagination-container">
                      <ul class="list-inline list-unstyled">
                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class=""><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                      </ul>
                      <!-- /.list-inline -->
                    </div>
                    <!-- /.pagination-container --> </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="search-result-container ">
                <div id="myTabContent" class="tab-content category-list">
                  <div class="tab-pane active " id="grid-container">
                    @include('user.populartags_view_ajax')
                    <!-- /.category-product -->

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane "  id="list-container">
                    <div class="category-product" id="list-containerr">
                      <!-- /.category-product-inner -->
                      @include('user.populartags_view_ajaxlist')
                    </div>
                    <!-- /.category-product -->
                  </div>
                  <!-- /.tab-pane #list-container -->
                </div>
                <!-- /.tab-content -->
                <div class="clearfix filters-container">
                  <div class="text-right">
                    <div class="pagination-container">
                      <ul class="list-inline list-unstyled">
                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                      </ul>
                      <!-- /.list-inline -->
                    </div>
                    <!-- /.pagination-container --> </div>
                  <!-- /.text-right -->

                </div>
                <!-- /.filters-container -->

              </div>
              <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
          </div>
        @include('user.body.brands')
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function(){
        $('#sort li').on('click', function(){
            if($('li.grid').hasClass('active'))
                {
                  var grid = '1';
                }
                else
                {
                  var grid = '0';
                }
            var sort = $(this).text();
            var key = $('#key').val();
            $('#sort_toggle').html(sort+'<span class="caret"></span>');
            $.ajax({
                url:"{{  url('/tag/popular/view/ajax') }}/"+key,
                type:"get",
                data:{sort:sort,grid:grid},
                success:function(data){
                    $('#grid-container').html(data);
                    $('#list-containerr').html(data);
                }
            })
        });

        $('li.grid').on('click', function(){

            var grid = '1';
            var sort = $('#sort_toggle').text();
            var key = $('#key').val();
            $.ajax({
                url:"{{  url('/tag/popular/view/ajax') }}/"+key,
                type:"get",
                data:{sort:sort,grid:grid},
                success:function(data){
                    $('#grid-container').html(data);
                }
            })
        });
        $('li.list').on('click', function(){

            var grid = '0';
            var sort = $('#sort_toggle').text();
            var key = $('#key').val();
            $.ajax({
                url:"{{  url('/tag/popular/view/ajax') }}/"+key,
                type:"get",
                data:{sort:sort,grid:grid},
                success:function(data){
                    $('#list-containerr').html(data);
                }
            })
        });
    });
</script>
@endsection
{{-- grid-container --}}
{{-- <li role="presentation"><a href="">position</a></li>
<li role="presentation"><a href="">Price:Lowest first</a></li>
<li role="presentation"><a href="">Price:Highest first</a></li>
<li role="presentation"><a href="">Product Name:A to Z</a></li> --}}
