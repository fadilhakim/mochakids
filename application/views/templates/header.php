<body>
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <?php $this->load->view('sparepart/v_login_popup'); ?>
    <nav id="top" class="htop navbar navbar-default navbar-fixed-top" style="min-height:0px;">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><a href="tel:+62-21-4585-6666"><i class="fa fa-phone"></i>Customer Support : +62 813 8008 8927</a></li>
                <li class="email"><a href="mailto:info@besha-analitika.co.id"><i class="fa fa-envelope"></i>info@mochakidshop.com</a></li>
              </ul>
            </div>
            
          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
            <?php if(!$this->session->userdata('email')){ ?>
              <li>
                <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
              </li>
              <li class="dropdown">
                <a href="<?php echo base_url('sparepart/signup'); ?>">Sign up</a>
              </li>
             <?php } else {?>
              <li>
                <a href="<?php echo base_url('sparepart/logout');  ?>">Logout</a>
              </li>
            <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <?php echo $this->session->flashdata('msg_subs'); ?>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="<?php echo base_url('home'); ?>"><img class="img-responsive" src="<?php echo base_url('assets/image/logo_mocha.png') ?>" title="Mocha Kids Logo" alt="Mocha Kids Logo" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            
          </div>
          <!-- Mini Cart End-->
          <!-- Search Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner light">
            <div class="right-wrapper">
                <div class="cart"><!--Start Cart-->
                  <a href="#">
                    <i class="fa fa-shopping-cart dropdown-toggle" data-toggle="dropdown"></i>
                    <span class="cart-block pull-right">
                        <span class="cart-num">
                          <?php echo count($this->cart->contents()); ?>
                        </span>
                    </span>
                    </a>
                    <div class="dropdown-menu">
                       <?php if(!$this->cart->contents()){
                        echo 'You don\'t have any items yet.';
                      }
                      else {?>
                        <p><?php echo count($this->cart->contents()); ?> item(s) in your cart</p>
                        <?php $i = 1; ?>
                        <?php foreach($this->cart->contents() as $items): ?>
                        <div class="product clearfix">
                          <a href="<?=base_url("cart/remove_item/$items[rowid]")?>"><i class="fa fa-close"></i></a>
                          <figure class="product-images">
                              <a href="#">
                                  <img src="<?php echo base_url('assets/sp/images/products/').$items['image']; ?>" alt=""/>
                                </a>
                            </figure>
                            <div class="product-detail">
                              <h5 class="product-name">
                                  <a href="<?php echo base_url('cart/show_cart'); ?>"><?php echo substr($items['name'],0,35); ?></a>
                                </h5>
                                <div class="product-rate">
                                  <span>Rp. <?php echo number_format($items['price']); ?></span>
                                </div>
                            </div>
                        </div>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                      <?php } ?>  
                        <div class="clearfix">
                          <ul class="pull-left action-info">
                              <!-- <li>
                                  Shopping:
                                    <span>$5.00</span>
                                </li>
                              <li> -->
                                  Total Items:
                                  <span><?php echo count($this->cart->contents()); ?></span>
                              </li>
                              <li>
                                  Total Price:
                                  <span>Rp <?php echo $this->cart->total(); ?></span>
                              </li>
                            </ul>
                            <ul class="pull-right action-btn">
                              <li><a href="<?php echo base_url('cart/show_cart'); ?>">See Cart</a></li>
                             <!--   <li><a href="#">Checkout</a></li> -->
                          </ul>
                      </div>
                    </div>
                </div><!--End Cart-->
            </div>
          </div>
          <!-- Search End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main Menu Start-->
    <div class="container">
      <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="Home" href="<?php echo base_url('home'); ?>"><span>Home</span></a></li>
            <li class="mega-menu dropdown"><a href="<?php echo base_url('home'); ?>">Home</a></li>
            <li class="menu_brands dropdown"><a href="<?php echo base_url('about'); ?>">About</a>
            </li>
            <!-- <li class="custom-link"><a href="#">Custom Links</a></li> -->
            <!-- <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>Custom Block</a> -->
              <!-- <div class="dropdown-menu custom_block">
                <ul>
                  <li>
                    <table>
                      <tbody>
                        <tr>
                          <td><img alt="" src="image/banner/cms-block.jpg"></td>
                          <td><img alt="" src="image/banner/responsive.jpg"></td>
                          <td><img alt="" src="image/banner/cms-block.jpg"></td>
                        </tr>
                        <tr>
                          <td><h4>CMS Blocks</h4></td>
                          <td><h4>Responsive Template</h4></td>
                          <td><h4>Dedicated Support</h4></td>
                        </tr>
                        <tr>
                          <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                          <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                          <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                        </tr>
                        <tr>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                </ul>
              </div> -->
            </li>
            <li class="dropdown"><a href="<?php echo base_url('product'); ?>">Ready Stock</a>
            <li class="dropdown"><a href="<?php echo base_url('product'); ?>">Pre-Order</a>
              <!-- <div class="dropdown-menu">
                <ul>
                  <li><a href="category.html">Category (Grid/List)</a></li>
                  <li><a href="product.html">Product</a></li>
                  <li><a href="cart.html">Shopping Cart</a></li>
                  <li><a href="checkout.html">Checkout</a></li>
                  <li><a href="compare.html">Compare</a></li>
                  <li><a href="wishlist.html">Wishlist</a></li>
                  <li><a href="search.html">Search</a></li>
                  <li><a href="manufacturer.html">Brands</a></li>
                </ul>
                <ul>
                  <li><a href="about-us.html">About Us</a></li>
                  <li><a href="email-template/index.html" target="_blank">Email Template Page</a></li>
                  <li><a href="elements.html">Elements</a></li>
                  <li><a href="elements-forms.html">Forms</a></li>
                  <li><a href="careers.html">Careers</a></li>
                  <li><a href="faq.html">Faq</a></li>
                  <li><a href="404.html">404</a></li>
                  <li><a href="sitemap.html">Sitemap</a></li>
                  <li><a href="contact-us.html">Contact Us</a></li>
                </ul>                
                <ul>
              <li><a href="login.html">Login</a></li>
                  <li><a href="register.html">Register</a></li>
                  <li><a href="my-account.html">My Account</a></li>
                  <li><a href="order-history.html">Order History</a></li>
                  <li><a href="order-information.html">Order Information</a></li>
                  <li><a href="return.html">Return</a></li>
                  <li><a href="gift-voucher.html">Gift Voucher</a></li>
              </ul>
              </div> -->
            </li>
            <li class="contact-link"><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
            <li class="custom-link-right">
              <div id="search" class="input-group" style="margin-top: 2px;">
              <form class="" action="<?php echo base_url('product/search'); ?>"  method="post">
                <input id="filter_name" type="text" name="keyword" value="" placeholder="Search for product" class="form-control input-lg" />
                <button type="submit" class="button-search" ><i class="fa fa-search"></i></button>
              </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container example1">
        <h3>Free ongkir JABODETABEK untuk pembelian minimal IDR 1.000.000</h3>
      </div>
    </div>
    <!-- Main Menu End-->
  </div>