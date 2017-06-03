

<div class="row">
<!--Middle Part Start-->
	<div id="content" class="col-sm-12">
	  <h3 class="title"><span class="pull-left">This is your order code :  <strong>#<?=$detail_order["id_order"]?></strong></span>
      
      <span class="pull-right"><h3 class="label label-primary"> status : <?=$detail_order["status"]?></h3></span>
      </h3>
      <span class="clearfix"><br></span>
        <?=$this->session->flashdata("message");?>
        <?php
		
		?>
	    <div class="table-responsive">
	      <table class="table table-bordered">
	        <thead>
	          <tr>
	            <td class="text-center">Image</td>
	            <td class="text-left">Product Name</td>
	            <td class="text-left">Product Code</td>
	            <td class="text-left">Quantity</td>
	            <td class="text-right">Unit Price</td>
	            <td class="text-right">Sub Total</td>
	          </tr>
	        </thead>
	        <tbody>
              <?php
			  foreach($detail_list_order as $row)
			  {
				  
				  $product = $this->model_product->get_detail_product($row["product_id"]);
				  $url_product = base_url("product/$product[product_id]/$product[product_category]/$product[product_slug]");  
			  ?>
	          <tr>
              
	            <td class="text-center"><a href="<?=$url_product?>" target="_blank"><img height="100" width="80"  src="<?=base_url("assets/image/product/$product[product_image_1]")?>" alt="<?=$product["product_title"]?>" title="<?=$product["product_title"]?>" class="img-thumbnail" /></a>
               
                </td>
	            <td class="text-left"><a href="<?=$url_product?>" target="_blank"> <?=$product["product_title"]?> </a><br />
	             </td>
	            <td class="text-left"><?=$product["product_code"]?></td>
	            <td class="text-left"><div class="input-group btn-block quantity">
	               <?=$row["qty"]?></div>
	            <td class="text-right">Rp. <?=number_format($product["price"])?></td>
	            <td class="text-right">Rp. <?=number_format($row["sub_total"])?></td>
	          </tr>
	          <?php
			  }
			  ?>
	        </tbody>
	      </table>
	    </div>
	  <h3> Payment Confirmation </h3>
      <form method="post" id="form-confirm" action="<?=base_url("checkout/payment_process")?>">
	  <div class="row">
	    <div class="col-sm-6">
	      <div class="panel panel-default">
	        <div class="panel-heading">
	          <h3 class="panel-title">
              <span class="pull-left"> Status: </span> <span class="pull-right">
              <span class="label label-default">
               <?=isset($payment["status"]) ? $payment["status"] : "waiting for confirmation" ?> </span> </span> </h3>
              <span class="clearfix"></span>
	        </div>
	        <div id="collapse-coupon" class="panel-collapse collapse in">
	          <div class="panel-body">
              	  <?php
				   if(empty($payment))
				   {
				  ?>
	              		<input type="hidden" value="profile" name="type_form">
                  		<fieldset>
                    <div class="form-group col-lg-12 required">
                      <label>Nomor Order</label>
                      
                        <input type="text" name="no_order" id="input-name" readonly placeholder="Nomor Order" class="form-control" value="<?=$this->uri->segment(4)?>" />
                        <span class="text-danger"><?php echo form_error('no_order'); ?></span>
                      
                    </div>
                    <div class="form-group col-lg-12 required">
                      <label class="control-label">Jumlah Pembayaran</label>
                      
                        <input type="number" name="jumlah_pembayaran" value=""  placeholder="Jumlah Pembayaran" class="form-control" />
                        <input type="hidden" name="grand_total" value="<?=$detail_order["grand_total"]?>">
                        
                         <span class="text-danger"><?php echo form_error('jumlah_pembayaran'); ?></span>
                     
                    </div>
                    <div class="form-group col-lg-12 required">
                      <label class="control-label">Transfer Order (Rekening Bank Anda)</label>
                     
                        <input type="text" name="user_bank"  placeholder="Nama Bank" class="form-control" /><br>
                        <input type="text" name="user_bank_rekening" placeholder="No Rekening" class="form-control" />
                        <br>
                        <input type="text" name="atas_nama" placeholder="a/n (Nama Pemilik akun Bank)" class="form-control">
                        
                        <br>
                        <label class="control-label">Ke Rekening(Rekening Mocahkids Pilihan Anda)</label><br>
                        <select class="form-control" name="id_bank" id="id_bank">
                          <?php foreach($bank as $row){?>
                          <option value="<?=$row->id_bank?>"><?=$row->nama_bank?> : <?=$row->rekening_bank ?> a/n <?=$row->nama_pemilik?></option>
                          <?php } ?>
                        </select>
                      
                    </div>
                    <br>
                    <div class="form-group col-lg-12  required">
                      <label class="control-label">Upload Bukti Transfer</label>
                   
                        <input type="file"  name="document">
                        <span class="text-danger"><?php echo form_error('message'); ?></span>
                     
                     
                    </div>
                    
                  </fieldset>
                  <?php
				   }
				   else if(!empty($payment))
				   {
					   $data["bank_dt"] = $bank_dt;
					   $data["payment"] = $payment;
					   $this->load->view("fix_payment_conf",$data);   
				   }
				  ?>
				
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="col-sm-6">
	      <table class="table table-bordered">
	        <tr>
	          <td class="text-right"><strong>Sub-Total:</strong></td>
	          <td class="text-right"><h4>Rp. <?=number_format($detail_order["subtotal"])?> </h4></td>
	        </tr>
	        <tr>
	          <td class="text-right"><strong>Ongkir :</strong></td>
	          <td class="text-right"><h4>Rp. <?=number_format($detail_order["ongkir"])?></h4></td>
	        </tr>
	        <tr>
	          <td class="text-right"><strong>TAX (<?=TAX_TEXT?>):</strong></td>
	          <td class="text-right"><h4>Rp. <?=number_format(TAX * $detail_order["subtotal"])?></h4></td>
	        </tr>
	        <tr>
	          <td class="text-right"><strong>Grand Total:</strong> <br>( jumlah pembayaran )</td>
	          <td class="text-right"><h4 class="text-success">Rp. <?=number_format($detail_order["grand_total"])?></h4></td>
	        </tr>
	      </table>
	    </div>
	 
	  </div>
	
	    
	  <div class="buttons">
	    <div class="pull-left"><a href="index-2.html" class="btn btn-default">Continue Shopping</a></div>
        <?php
		 if(empty($payment))
		 {
		?>
	    <div class="pull-right"><button class="btn btn-primary">Confirm</button></div>
        <?php
		 }else
		 {?>
			 <div class="pull-right"><a href="<?=base_url("profile/order")?>" class="btn btn-primary"> Bank to Order </a></div>
		 <?php }
		?>
	  </div>
      </form>
	</div>
<script>



</script>
<!--Middle Part End -->


   

