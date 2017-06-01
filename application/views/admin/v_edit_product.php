<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php foreach ($product_cat->result() as $row) {
    
      $product_id=$row->product_id;
      $product_title=$row->product_title;
      $product_desc=$row->product_descrption;

      $product_brand=$row->manu_id;
      $product_code=$row->product_code;
      $product_availability=$row->product_availability;
      $product_category=$row->product_category;
      $featured=$row->featured;
	  
	  $pack_item = $row->pack_item;
	  $deposit = $row->deposit;
	  $eta = $row->ETA;
	  $minimum_order = $row->minimum_order;
	  $size = $row->size;
	  $style_code = $row->style_code;
	  $price = $row->price;
      $old_price = $row->old_price;

      $product_image_1=$row->product_image_1;
}

?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Edit Product</h4>
                    <div class="row">
                        <div class="col-lg-12">
                 
                            
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Product Name : <?php echo $product_title; ?></h4>
                                <?=$this->session->flashdata("message")?>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/product_f'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Product Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $product_id; ?>" name="product_id" type="hidden">
                                            <?php
                                                $cek_rol = $this->session->userdata('role_id');

                                                if($cek_rol != 1 ){ ?>
                                                <input class="form-control" style="background-color: #ccc !important" value="<?php echo $product_title; ?>" name="product_title" readonly placeholder="Change Product Title " type="text">
                                                <?php } else { ?>
                                                <input class="form-control" value="<?php echo $product_title; ?>" name="product_title" required placeholder="Change Title " type="text">

                                                <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Product Brand</label>
                                        <div class="col-sm-9">
                                            
                                                <?php
                                                    $cek_rol = $this->session->userdata('role_id');

                                                    if($cek_rol != 1 ){ ?>
                                                        <?php foreach ($manufacturer as $ma) { ?>
                                                         <input class="form-control" style="background-color: #ccc !important" value="<?php echo $ma->manu_title; ?>" name="manu_id" readonly placeholder="Change Product Brand " type="text">
                                                        <?php } ?> 
                                                    <?php } else { ?>
                                                        <select class="form-control" name="manu_id">
                                                        <?php foreach ($manufacturer as $ma) { ?> 
                                                            <option selected="selected"   value="<?php echo $ma->manu_id; ?>"><?php echo $ma->manu_title; ?></option>
                                                        <?php } ?>

                                                        <?php foreach ($manu as $m) { ?>
                                                            <option value="<?php echo $m->manu_id; ?>"><?php echo $m->manu_title; ?></option>
                                                        <?php } ?> 
                                                         </select>
                                                <?php } ?>

                                           
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Product Category</label>
                                        <div class="col-sm-9">
                                              <?php
                                                    $cek_rol = $this->session->userdata('role_id');

                                                    if($cek_rol != 1 ){ ?>
                                                        
                                                        <input class="form-control" style="background-color: #ccc !important" value="<?php echo $product_category; ?>" name="product_category" readonly placeholder="Change Product Category" type="text">
                                                    <?php } else { ?>
                                                    <select class="form-control" name="product_category">
                                                        <option selected="selected" value="<?php echo $product_category; ?>"><?php echo $product_category; ?></option>
                                                        <?php foreach ($category as $c) { ?> 
                                                            <option value="<?php echo $c->category_title; ?>"><?php echo $c->category_title; ?></option>
                                                        <?php } ?>
                                                    </select>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Product Code</label>
                                        <div class="col-sm-9">
                                            <?php
                                                $cek_rol = $this->session->userdata('role_id');

                                                if($cek_rol != 1 ){ ?>
                                                 <input class="form-control" style="background-color: #ccc !important" value="<?php echo $product_code; ?>" name="product_code" readonly placeholder="Change Product Code " type="text">
                                                <?php } else { ?>
                                                <input class="form-control" value="<?php echo $product_code; ?>" name="product_code" required placeholder="Change Product Code " type="text">
                                                <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Product Availability</label>
                                        <div class="col-sm-9">

                                              <?php
                                                $cek_rol = $this->session->userdata('role_id');
                                                if($cek_rol == 3 ){ ?>
                                                  <input class="form-control" value="<?php echo $product_availability; ?>" name="product_availability" readonly style="background-color: #ccc !important;" placeholder="Product Stock">
                                                <?php } else {?>
                                                    <select class="form-control" name="product_availability" id="product_availability" required>
                                                      
                                                      <?php foreach ($stock as $s) { 
													  
													  $selected = "";
													  if($s->status_id == $product_availability)
													  {
														  $selected = "selected=selected";
													  }
													  ?>
                                                          <option value="<?php echo $s->status_title; ?>" <?=$selected?>><?php echo $s->status_title; ?></option>
                                                      <?php } ?>
                                          			</select>
                                                       
                                                <?php } ?>
                                        </div>
                                    </div>
									<div class="form-group hidden" id="mo_element" >
                                        	<label id="lbl-mo" class="col-sm-3 control-label" style="text-align:left;">Minimum Order</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="minimum_order" id="minimum_order" class="form-control" value="<?=$minimum_order?>" disabled >
                                            </div>
                                        
                                    </div>
                                    <div class="form-group hidden" id="eta_element">
                                        	<label class="control-label col-sm-3" style="text-align:left;">ETA </label>
                                            <div class="col-sm-9">
                                            <input type="text" name="eta" id="eta" class="form-control datepicker1" value="<?=$eta?>" disabled>
                                            </div>
                                         	
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Featured Product</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="featured">
                                                <?php if ($featured == '0') {?>
                                                    <option selected="selected" value="<?php echo $featured; ?>">No</option>
                                                <?php } else { ?>
                                                    <option selected="selected" value="<?php echo $featured; ?>">Yes</option>
                                                <?php } ?>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label class="col-sm-3 control-label" style="text-align:left;"> 1 Pack Pieces </label>
                                        <div class="col-sm-9">
                                        	<input type="text" name="pack_item" id="pack_item" class="form-control" value="<?=$pack_item?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label class="col-sm-3 control-label" style="text-align:left;"> Deposit </label>
                                        <div class="col-sm-9">
                                        	<input type="text" name="deposit" id="deposit" class="form-control" value="<?=$deposit?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label class="col-sm-3 control-label" style="text-align:left;"> Size</label>
                                        <div class="col-sm-9">
                                        	<input type="text" name="size" id="size" class="form-control" value="<?=$size?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label class="col-sm-3 control-label" style="text-align:left;"> Style Code</label>
                                        <div class="col-sm-9">
                                        	<input type="text" name="style_code" id="style_code" class="form-control" value="<?=$style_code?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label class="col-sm-3 control-label" style="text-align:left;"> Price</label>
                                        <div class="col-sm-9">
                                        	<input type="text" name="price" id="price" class="form-control" value="<?=$price?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Old Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="old_price" id="price" class="form-control" value="<?=$old_price?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Image</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="col-sm-6">
                                                        <label class="control-label" style="text-align:center; display:block;">Product Thumbnail</label><br>

                                                        <?php if($product_image_1 != '') {?>
                                                            <img src="<?php echo base_url('assets/image/product/').$product_image_1; ?>" class="img-responsive">
                                                        <?php } else {?>
                                                            <img src="<?php echo base_url('assets/image/no-image.png')?>" class="img-responsive">
                                                        <?php } ?>

                                                        <label class="col-sm-12 control-label" style="text-align:center;">Select New Image</label>
                                                        <div class="col-sm-12">
                                                        <br>
                                                        <input class="form-control" value="<?php echo $product_image_1; ?>" name="product_image_old_1" type="hidden">
                                                            <input class="" name="product_image_new_1" type="file">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Product Description</label>
                                        <div class="col-sm-9">
                                         <?php
                                            $cek_rol = $this->session->userdata('role_id');
                                            if($cek_rol == 2 ){ ?>
                                            <textarea id="editor2" class="form-control" readonly  style="background-color: #ccc !important" name="product_desc"><?php echo $product_desc; ?></textarea>
                                            <?php } else { ?>
                                            <textarea id="editor2" class="form-control" name="product_desc"><?php echo $product_desc; ?></textarea>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                            CKEDITOR.replace( 'editor2' );
                                            CKEDITOR.add            
                                    </script>

                                    <script type="text/javascript">
                                            CKEDITOR.replace( 'editor3' );
                                            CKEDITOR.add            
                                    </script>
                                    <div class="form-group text-right m-b-0">
                                        <button class="sa-success-product-edit btn btn-primary waves-effect waves-light" type="submit";>
                                            Edit
                                        </button>
                                    </div>
                                </form>
                            </div>

                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <footer class="footer">
                2017 © Mocha Kids | Go To : <a href="<?php echo base_url('home'); ?>" target="_blank" class="text-muted">mochakidshop.com</a>
            </footer>
        </div> <!-- container -->
    </div> <!-- content -->
	<script>
		  function pre_order()
		  {
			  var pa = $("#product_availability").val();
			  
			  if(pa == "Pre-Order")
			  {
			  
				  $("#mo_element").removeClass("hidden");
				  $("#minimum_order").removeAttr("disabled");
				  
				  $("#eta_element").removeClass("hidden");
				  $("#eta").removeAttr("disabled");
				  
				  
				  $(".datepicker1").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
					minDate:0	
				  });
			  }
			  else
			  {
				  $("#mo_element").addClass("hidden");
				  $("#minimum_order").attr("disabled");
				  
				  $("#eta_element").addClass("hidden");
				  $("#eta").attr("disabled");
			  }	
		  }
	  
		  $("#product_availability").change(function(){
			  
			  pre_order();
		  });
		  
		  $(document).ready(function(e) {
			  pre_order();
		  });
	

	</script>
        


</div>