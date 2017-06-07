<?php if(!empty($product->result())) {?>
<?php
                foreach($product->result() as $row){
                         $product_id=$row->product_id;
                  $product_title=$row->product_title;
                  $product_descrption=$row->product_descrption;

                  $product_brand=$row->manu_id;
                  $product_code=$row->product_code;
                  $product_availability=$row->product_availability;
                  $product_category=$row->product_category;
                 }
  ?>
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="<?php  echo base_url('home') ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php  echo base_url('product') ?>">Products</a></li>
            <li><a href="#"><?php $url = $this->uri->segment(3); echo $url;
      
            ?></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
         

           <h3 class="subtitle">Categories</h3>
          <div class="box-category">
            <ul id="cat_accordion">
               <?php foreach ($category as $c) { ?>
                <li><a href="<?php  echo base_url('product/category/'.$c->category_url); ?>"><?php echo $c->category_title ?></a></li>
               <?php } ?>
            </ul>
          </div>

          
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <!-- <h1 class="title"><?php echo $product_category; ?></h1> -->
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
            <?php
                foreach($product->result() as $row){
                  
                  $product_id=$row->product_id;
                  $product_title=$row->product_title;
                  $product_descrption=$row->product_descrption;
                  $product_category_url=$row->category_url;
                  $product_slug=$row->product_slug;

                  $product_brand=$row->manu_id;
                  $product_code=$row->product_code;
                  $product_availability=$row->product_availability;
                  $product_category=$row->product_category;

                  $product_image_1=$row->product_image_1;

            ?>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="<?php  echo base_url('product'.'/'.$product_id.'/'.$product_category_url.'/'.$product_slug); ?>"><img src="<?php echo base_url('assets/image/product').'/'.$product_image_1; ?>" alt="<?php echo $product_title; ?>" title="<?php echo $product_title; ?>" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="<?php  echo base_url('product'.'/'.$product_id.'/'.$product_category_url.'/'.$product_slug); ?>"><?php echo $product_title; ?></a></h4>
                    <p class="description"><?php echo $product_descrption ?></p>
                  </div>
                  <div class="button-group">
                    <a class="btn-primary" style="background-color:#0A098B;" href="<?php  echo base_url('product'.'/'.$product_id.'/'.$product_category_url.'/'.$product_slug); ?>"><span>See Product</span></button></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">&gt;</a></li>
                <li><a href="#">&gt;|</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
</div>
<?php } else { ?>
    <div id="container">
      <div class="container">
        <div class="row">
          <!--Left Part Start -->
          <aside id="column-left" class="col-sm-3 hidden-xs">
           

            <h3 class="subtitle">Categories</h3>
            <div class="box-category">
              <ul id="cat_accordion">
                 <?php foreach ($category as $c) { ?>
                  <li><a href="<?php  echo base_url('product/category/'.$c->category_url); ?>"><?php echo $c->category_title ?></a></li>
                 <?php } ?>
              </ul>
            </div>

            
          </aside>
          <div id="content" class="col-sm-9">
            <h3 class="title">Maaf belum ada product pada category ini</h3>
            <a href="<?php echo base_url("home"); ?>">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
<?php } ?>