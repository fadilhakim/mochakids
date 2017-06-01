<div id="container">
    <div class="container">
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          
          <h3 class="subtitle">Categories</h3>
          <div class="box-category">
            <ul id="cat_accordion">
               <?php foreach ($category as $c) { ?>
                <li><a href="<?php  echo base_url('product/'.$c->category_url); ?>"><?php echo $c->category_title ?></a></li>
               <?php } ?>
            </ul>
          </div>
          
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">Our Products</h1>
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">Show:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                  <option value="" selected="selected">20</option>
                  <option value="">25</option>
                  <option value="">50</option>
                  <option value="">75</option>
                  <option value="">100</option>
                </select>
              </div>
            </div>
          </div>
          <br />
          <div class="row products-category">
            <?php if(!empty($results)) {?>
            <?php foreach ($results as $p) { ?>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="<?php  echo base_url('product/'.$p->manu_id.'/'.$p->category_url.'/'.$p->product_slug); ?>"><img src="<?php echo base_url('assets/image/product').'/'.$p->product_image_1; ?>" alt="<?php echo $p->product_title?>" title="<?php echo $p->product_title?>" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="<?php  echo base_url('product/'.$p->manu_id.'/'.$p->category_url.'/'.$p->product_slug); ?>"><?php echo $p->product_title?></a></h4>
                    <div class="description"><?php echo $p->product_descrption?></div>
                  </div>
                  <div class="button-group">
                    <a class="btn-primary" style="background-color:#0A098B;" href="<?php  echo base_url('product/'.$p->manu_id.'/'.$p->category_url.'/'.$p->product_slug); ?>"><span>See Product</span></button></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } } else {?>
                <p>Maaf, masih belum ada product pada category ini</p>
            <?php } ?>
          </div>
          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <?php echo $links; ?>
              </ul>
            </div>
            <!-- <div class="col-sm-6 text-right">Showing 1 to 12 of 15 (2 Pages)</div> -->
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>