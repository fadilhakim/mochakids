

<div class="row">
<!--Middle Part Start-->
	<div id="content" class="col-sm-12">
	  <h3 class="title">This is your order code :  <strong>#<?=$detail_order["id_order"]?></strong></h3>
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
	            <td class="text-right">Total</td>
	          </tr>
	        </thead>
	        <tbody>
              <?php
			  foreach($detail_list_order as $row)
			  {
				  
				  
			  ?>
	          <tr>
              
	            <td class="text-center"><a href="product.html"><img src="image/product/samsung_tab_1-50x50.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
	            <td class="text-left"><a href="product.html"> Nama Product </a><br />
	             </td>
	            <td class="text-left">SAM1</td>
	            <td class="text-left"><div class="input-group btn-block quantity">
	               4 </div>
	            <td class="text-right">$230.00</td>
	            <td class="text-right">$230.00</td>
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
	          <h4 class="panel-title">Your Bank Transfer</h4>
	        </div>
	        <div id="collapse-coupon" class="panel-collapse collapse in">
	          <div class="panel-body">
	            
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
				
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="col-sm-6">
	      <table class="table table-bordered">
	        <tr>
	          <td class="text-right"><strong>Sub-Total:</strong></td>
	          <td class="text-right">$940.00</td>
	        </tr>
	        <tr>
	          <td class="text-right"><strong>Eco Tax (-2.00):</strong></td>
	          <td class="text-right">$4.00</td>
	        </tr>
	        <tr>
	          <td class="text-right"><strong>VAT (20%):</strong></td>
	          <td class="text-right">$188.00</td>
	        </tr>
	        <tr>
	          <td class="text-right"><strong>Total:</strong></td>
	          <td class="text-right">$1,132.00</td>
	        </tr>
	      </table>
	    </div>
	 
	  </div>
	
	    
	  <div class="buttons">
	    <div class="pull-left"><a href="index-2.html" class="btn btn-default">Continue Shopping</a></div>
	    <div class="pull-right"><button class="btn btn-primary">Confirm</button></div>
	  </div>
      </form>
	</div>
<script>



</script>
<!--Middle Part End -->


   

