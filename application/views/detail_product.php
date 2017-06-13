<?php
foreach($product_cat->result() as $row){
  
  $product_title=$row->product_title;
  $product_id=$row->product_id;
  $product_descrption=$row->product_descrption;

  $product_brand=$row->manu_id;
  $product_code=$row->product_code;
  $product_availability=$row->product_availability;
  $product_category=$row->product_category;
  $product_pack=$row->pack_item;
  $product_deposit=$row->deposit;
  $product_eta=$row->ETA;
  $product_size=$row->size;
  $product_status=$row->status;
  $product_price=$row->price;
  $product_old_price=$row->old_price;
  $product_stock=$row->stock;
  $product_weight=$row->weight;

  $product_image_1=$row->product_image_1;
  $product_image_2=$row->product_image_2;
  $product_image_3=$row->product_image_3;
  $product_image_4=$row->product_image_4;
}

?>


<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <!-- <ul class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo base_url('home'); ?>" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo base_url('product'); ?>" itemprop="url"><span itemprop="title">Product</span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" itemprop="url"><span itemprop="title"><?php echo $manu->manu_title ?></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" itemprop="url"><span itemprop="title"><?php echo $product_title; ?></span></a></li>
      </ul> -->
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <div itemscope itemtype="http://schema.org/Product">
           
            <?=$this->session->flashdata('message');?>
            <div class="row product-info">
              <div class="col-sm-offset-2 col-sm-3">
                <h4><?php echo  $product_title; ?></h4>
                <div class="image">
                  <img class="img-responsive" itemprop="image" id="zoom_01" src="<?php echo base_url('assets/image/product').'/'.$product_image_1; ?>" title="<?php echo $product_title; ?>" alt="<?php echo base_url('assets/image/product').'/'.$product_image_1; ?>" /> 
                </div>
               <!--  <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> Click image for Gallery</span></div>
                <div class="image-additional" id="gallery_01">
                  <?php if($product_image_1 != '') {?>
                    <a class="thumbnail" href="#" data-zoom-image="assets/image/product/<?php echo $product_image_1; ?>" data-image="assets/image/product/<?php echo $product_image_1; ?>" title="<?php echo $product_title; ?>"> <img src="<?php echo base_url('assets/image/product').'/'.$product_image_1; ?>" title="<?php echo $product_title; ?>" alt = "<?php echo $product_title; ?>"/></a> 
                  <?php } else {?>

                  <?php } ?>

                  <?php if($product_image_2 != '') {?>
                    <a class="thumbnail" href="#" data-zoom-image="assets/image/product/<?php echo $product_image_2; ?>" data-image="assets/image/product/<?php echo $product_image_2; ?>" title="<?php echo $product_title; ?>"><img src="<?php echo base_url('assets/image/product').'/'.$product_image_2; ?>" title="<?php echo $product_title; ?>" alt="<?php echo $product_title; ?>" /></a> 
                  <?php } else {?>

                  <?php } ?>

                  <?php if($product_image_3 != '') {?>
                    <a class="thumbnail" href="#" data-zoom-image="assets/image/product/<?php echo $product_image_3; ?>" data-image="assets/image/product/<?php echo $product_image_3; ?>" title="<?php echo $product_title; ?>"><img src="<?php echo base_url('assets/image/product').'/'.$product_image_3; ?>" title="<?php echo $product_title; ?>" alt="<?php echo $product_title; ?>" /></a> 
                  <?php } else { ?>

                  <?php } ?>

                  <?php if($product_image_4 != '') {?>
                    <a class="thumbnail" href="#" data-zoom-image="assets/image/product/<?php echo $product_image_4; ?>" data-image="assets/image/product/<?php echo $product_image_4; ?>" title="<?php echo $product_title; ?>"><img src="<?php echo base_url('assets/image/product').'/'.$product_image_4; ?>" title="<?php echo $product_title; ?>" alt="<?php echo $product_title; ?>" /></a> 
                  <?php } else { ?>

                  <?php } ?>
                </div> -->
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <h2>Additional Information</h2>
                  <li><b>Price : </b><span itemprop="mpn">Rp. <?php echo $product_price; ?></span></li>
                  <?php if($product_availability === 'sales_stock' ) {?>
                    <li><b>Old Price : </b><span itemprop="mpn"> <strike>Rp. <?php echo $product_old_price; ?></strike></span></li>
                  <?php } ?>

                  <li><b>1 Pack isi :</b> <span itemprop="mpn"><?php echo $product_pack; ?></span></li>
                  <li><b>Berat </b> <span itemprop="mpn"><?php echo $product_weight ?> Gram</span></li>
                  <!-- <li><b>Brand</b> <span itemprop="mpn"><?php echo $product_code; ?></span></li> -->
                  <li><b>Deposit per seri :</b> <span itemprop="mpn"><?php echo $product_deposit; ?></span></li>
                  <li><b>Detail :</b> <span itemprop="mpn"><?php echo $product_descrption; ?></span></li>
                  <li><b>ETA :</b> <span itemprop="mpn"><?php echo $product_eta; ?></span></li>
                  <li><b>Size :</b> <span itemprop="mpn"><?php echo $product_size; ?></span></li>
                  <li><b>Stock :</b> <span itemprop="mpn"><?php echo $product_stock; ?></span></li>
                  <li><b>Availability:</b> <span class="instock"><?php echo $product_availability; ?></span></li>
                  <li style="text-align: center; font-size: 22px; margin-top: 20px;"><b>Product Code:</b> <span itemprop="mpn"><?php echo $product_code; ?></span></li>
                  <li>
                    <?php foreach($this->cart->contents() as $items): ?>


                    <?php endforeach; ?>
                  </li>
                </ul>
                <ul class="price-box">
                   <?php echo form_open('cart/add_cart_item'); ?>
                    <div class="col-sm-4 xs-spacer20">
                        <div class="qty_wrap">
                            <label for="prod_qty">Qty:</label><input type="number" min="1" name="quantity" id="prod_qty" class="spinc" value="1" />
                        </div>
                    </div>
                    <div class="cart-btn col-sm-6 col-xs-6">
                            <input type="hidden" name="product_id" value="<?php echo $row->product_id ?>">
                            <input type="hidden" name="product_code" value="<?php echo $row->product_code ?>">
                            <input type="hidden" name="product_title" value="<?php echo $row->product_title ?>">
                            <input type="hidden" name="product_image_1" value="<?php echo $row->product_image_1 ?>">
                            <input style="border-color: #e4e4e4;color: #fff; background-color: #d33d3d;" type="submit" class="btn" value="BELI SEKARANG">
                        <?php echo form_close(); ?>
                    </div>
                </ul>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="../../../../www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
           
            <h3 class="subtitle">Related Products</h3>
            <div class="owl-carousel related_pro">
              <?php foreach ($related as $rpr) { ?>
              <div class="product-thumb">
                <div class="image"><a href="<?php  echo base_url('product/'.$rpr->manu_id.'/'.$rpr->category_url.'/'.$rpr->product_slug); ?>"><img src="<?php echo base_url('assets/image/product/'.$rpr->product_image_1); ?>" alt="<?php echo $rpr->product_title; ?>" title="<?php echo $rpr->product_title; ?>" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="<?php  echo base_url('product/'.$rpr->manu_id.'/'.$rpr->category_url.'/'.$rpr->product_slug); ?>" style="font-size:15px; font-weight:bold; color:#FAB609; line-height:23px; margin-bottom:10px;"><?php echo $rpr->product_title; ?></a></h4>
                </div>
                <div class="button-group">
                  <a class="btn-primary" style="background-color:#0A098B;" href="<?php  echo base_url('product/'.$rpr->manu_id.'/'.$rpr->category_url.'/'.$rpr->product_slug); ?>"><span>Detail Product</span></a>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>