<div id="container">
    <div class="container">
      <div class="row">
        <!--Left Part Start -->
        <!-- <aside id="column-left" class="col-sm-3 hidden-xs">
          
          <h4 class="subtitle">Categories</h4>
          <div class="box-category">
            <ul id="cat_accordion">
               <?php foreach ($category as $c) { ?>
                <li><a href="<?php  echo base_url('product/category/'.$c->category_url); ?>"><?php echo $c->category_title ?></a></li>
               <?php } ?>
            </ul>
          </div>
          
        </aside> -->
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
         <?php $page_status=$this->uri->segment(2);
            if($page_status == 'pre_order'){
         ?>
         <style type="text/css">
           .po_info {
               margin-bottom:30px;
               width: 100%; 
               height: 230px; 
               background-color: #F5F5F5; 
               border: 1px solid #ccc; 
               border-radius: 3px;
               margin-left: 0px;
           }
         </style>
            <div class="row po_info">
              <div class="col-md-12 col-sm-12" >
                <?php foreach ($information as $info) { ?> 
                  <?php echo $info->information_desc ?>
                <?php } ?>
              </div>
            </div>
            <div class="product-filter">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                  <h1 class="title" style="margin-bottom: 0px">Chose or PO Catalog</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="btn-group" style="float: right;">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                  </div>
                </div>
              </div>
           </div>
            <div class="row products-category">
              <?php if(!empty($results)) {?>
              <?php foreach ($results as $p) { ?>

              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image"><a href="<?php  echo base_url('product'.'/'.$p->category_url.'/'.$p->product_slug); ?>"><img src="<?php echo base_url('assets/image/product').'/'.$p->product_image_1; ?>" alt="<?php echo $p->product_title?>" title="<?php echo $p->product_title?>" class="img-responsive" /></a></div>
                  <div>
                    <div class="caption">
                      <h4><a href="<?php  echo base_url('product'.'/'.$p->category_url.'/'.$p->product_slug); ?>"><?php echo $p->product_title?> <br> <span style="font-size: 13px;">Tutup PO Tanggal : <?php echo $p->ETA?></span></a>
               
                      </h4>
                      <div class="description"><?php echo $p->product_descrption?></div>

                    </div>
                    <div class="button-group">
                      <a class="btn-primary" style="background-color:#0A098B;" href="<?php  echo base_url('product'.'/'.$p->category_url.'/'.$p->product_slug); ?>"><span>See Product</span></button></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } } else {?>
                  <p>Maaf, masih belum ada product pada category ini</p>
              <?php } ?>
            </div>
          <?php } ?>
          <?php $page_status=$this->uri->segment(2);
     
         ?>

         <style type="text/css">
           .po_info {
               margin-bottom:30px;
               width: 100%; 
               min-height: 230px; 
               background-color: #F5F5F5; 
               border: 1px solid #ccc; 
               border-radius: 3px;
               margin-left: 0px;
           }
         </style>
            <div class="row po_info">
              <div class="col-md-12 col-sm-12" >
                <?php foreach ($information as $info) { ?> 
                  <?php echo $info->information_desc ?>
                <?php } ?>
              </div>
            </div>
          <div class="product-filter">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <h1 class="title" style="margin-bottom: 0px">Purchase Order Category</h1> 
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="btn-group" style="float: right;">
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
              </div>
            </div>

          </div>
          <br />
          <div class="row products-category">
            <?php if(!empty($results)) {?>

            <?php foreach ($results as $p) { ?>


            <?php $date1 = str_replace('-', '',date('Y-m-d')) ?>
            <?php $date2 = str_replace('-', '',$p->expired); ?>
            <?php if ($date1  <= $date2) { ?>
     
            
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="<?php  echo base_url('product/po_list/'.$p->category_po_id.'/'.$p->category_po_url); ?>"><img src="<?php echo base_url('assets/image/product/category_po').'/'.$p->category_po_image; ?>" alt="<?php echo $p->category_po_title?>" title="<?php echo $p->category_po_title?>" class="img-responsive" /></a></div>
                <div>
                <style type="text/css">
                  .caption {
                    background-color: #000;
                  }
                  .caption a {
                    color: #fff;
                    font-size: 17px;

                  }
                </style>
                  <div class="caption">
                    <a class="code-f" style="display:block " href="<?php  echo base_url('product/po_list/'.$p->category_po_id.'/'.$p->category_po_url); ?>"><?php echo $p->category_po_title?></a>
                    <a class="code-f" href="<?php  echo base_url('product/po_list/'.$p->category_po_id.'/'.$p->category_po_url); ?>">Close PO : <?php echo $p->display_date?></a>
                   <!--  <div class="description"><?php echo $p->expired?></div> -->
                  </div>
                  <div class="button-group">
                    <a style="width: 100%; display: block;" class="btn-primary" style="background-color:#0A098B;" href="<?php  echo base_url('product/po_list/'.$p->category_po_id.'/'.$p->category_po_url); ?>"><span>See Product</span></button></a>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>

            <?php } } else {?>
                <p>Maaf, masih belum ada product pada category ini</p>
            <?php } ?>
          </div>
          <!-- <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <?php echo $links; ?>
              </ul>
            </div>
          </div> -->
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>