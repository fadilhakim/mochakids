<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">Products</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          
         <!--  <div class="banner owl-carousel">
            <div class="item"> <a href="#"><img src="image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div>
          </div> -->

          <h4 class="subtitle">Categories</h4>
          <div class="box-category">
            <ul id="cat_accordion">
               <?php foreach ($category as $c) { ?>
                <li><a href="<?php  echo base_url('product_categories/'.$c->category_url); ?>"><?php echo $c->category_title ?></a></li>
               <?php } ?>
            </ul>
          </div>
          
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">Search Result</h1>
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
              </div>
            </div>
          </div>
          <br />
          <div class="row products-category">
          <?php if (!empty($results)) { ?>
          <?php foreach ($results as $p) { ?>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="<?php  echo base_url('product/'.$p->manu_id.'/'.$p->category_url.'/'.$p->product_slug); ?>"><img src="<?php echo base_url('assets/image/product').'/'.$p->product_image_1; ?>" alt="<?php echo $p->product_title?>" title="<?php echo $p->product_title?>" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="<?php  echo base_url('product/'.$p->manu_id.'/'.$p->category_url.'/'.$p->product_slug); ?>"><?php echo $p->product_title?></a></h4>
                    <!-- <p class="description"><?php echo $p->product_text_preview?></p> -->
                  </div>
                  <div class="button-group">
                    <a class="btn-primary" style="background-color:#0A098B;" href="<?php  echo base_url('product/'.$p->manu_id.'/'.$p->category_url.'/'.$p->product_slug); ?>"><span>See Product</span></button></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } } else {?>
            <h2>Sorry Product Not Found</h2>
            
          <?php }  ?>

          </div>

        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>