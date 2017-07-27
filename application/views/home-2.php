<div id="container">
    <div class="container">
      <div class="row">
        <div id="content" class="col-sm-12">
          <!-- Slideshow Start-->
          <div class="slideshow single-slider owl-carousel">
           <?php foreach ($slider as $s) { ?>
               <div class="item"> 
                 <a href="<?php echo $s->slider_link; ?>">
                    <img class="img-responsive"src="<?php echo sprintf("assets/image/slider/%s", $s->silder_image) ?> " alt="<?php echo $s->slider_title ?>" />
                 </a> 
               </div>
           <?php } ?>
          </div>
          <!-- Slideshow End-->
          <!-- Featured Product Start-->
          <h3 class="subtitle">Shop By Category</h3>
          <div class="owl-carousel product_carousel">
            <?php foreach ($category as $c) { ?>
            <div class="product-thumb clearfix">
              <div class="image"><a href="<?php  echo base_url('product_category/'.$c->category_url); ?>"><img src="<?php echo ('assets/image/product_category'.'/'.$c->image) ?>" alt="<?php echo $c->category_title?>" title="<?php echo $c->category_title?>" class="img-responsive" /></a></div>
                <h4><a href="<?php  echo base_url('product_category/'.$c->category_id.'/'.$c->category_url); ?>" class="code-f" style="display: block; text-align: center;"><?php echo $c->category_title?></a></h4>
              <div class="button-group">
                <a href="<?php  echo base_url('product_category/'.$c->category_url); ?>" class="btn btn-primary" ><span>View Product</span></a>
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- Brand Logo Carousel End -->
        </div>
        <!--Middle Part End-->
      </div>
    </div>
    
</div>
 