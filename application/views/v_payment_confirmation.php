<?php
	$post_data = $this->session->flashdata("post_data");
?>
<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<label style="color:red;">* Wajib Di isi</label>
	<hr>
    
    <div><?=$this->session->flashdata("message");?></div>
	<form method="post" action="<?=base_url("checkout/payment_process")?>" enctype="multipart/form-data">
    	<input type="hidden" name="type_form" value="checkout" />
	 	<fieldset class="col-md-6">
          <div class="form-group required">
            <label class="col-md-4 control-label" >Nomor Order</label>
            <div class="col-md-8">
              <input type="type" name="no_order" id="input-name" readonly placeholder="Nomor Order" class="form-control" value="<?=$this->uri->segment(3)?>" />
              <span class="text-danger"><?php echo form_error('no_order'); ?></span>
            </div>
          </div><br><br>
          <div class="form-group required">
            <label class="col-md-4 control-label">Jumlah Pembayaran</label>
            <div class="col-md-8">
              <input type="number" name="jumlah_pembayaran" value="<?=$post_data["jumlah_pembayaran"]?>"  placeholder="Jumlah Pembayaran" class="form-control"  />
              <input type="hidden" name="grand_total" value="<?=$detail_order["grand_total"]?>">
               <span class="text-danger"><?php echo form_error('jumlah_pembayaran'); ?></span>
            </div>
          </div><br><br>
          
          <div class="form-group required">
            <label class="col-md-4 control-label">Transfer Order (Rekening Bank Anda)</label>
            <div class="col-md-8">
              <input type="text" name="user_bank"  placeholder="Nama Bank" class="form-control" value="<?=$post_data["user_bank"]?>" /><br>
              <input type="text" name="user_bank_rekening" placeholder="No Rekening" class="form-control" value="<?=$post_data["user_bank_rekening"]?>" />
              <br>
              <input type="text" name="atas_nama" placeholder="a/n (Nama Pemilik akun Bank)" class="form-control" value="<?=$post_data["atas_nama"]?>">
              
              <br>
              
            </div>
          </div>
          <span class="clearfix"></span>
          <div class="form-group required">
          	<label class="control-label col-md-4">Ke Rekening(Rekening Mocahkids Pilihan Anda)</label>
            <div class="col-md-8">
            <select class="form-control" name="id_bank" id="id_bank">
              <?php foreach($bank as $row){?>
              <option value="<?=$row->id_bank?>"><?=$row->nama_bank?> : <?=$row->rekening_bank ?> a/n <?=$row->nama_pemilik?></option>
              <?php } ?>
            </select>
            </div>
          </div>
          <span class="clearfix"></span>
          <br>
          <div class="form-group required">
            <label class="col-md-4 control-label">Upload Bukti Transfer</label>
           
              <input type="file"  name="document">
              <span class="text-danger"><?php echo form_error('message'); ?></span>
            
            
          </div>
          <input class="col-lg-4 btn btn-primary" type="submit" value="Confirm" />
        </fieldset>
        <div class="col-md-6">
        	<table class="table total-table">
              <tbody>
                <?php
                  // perhitungan grand total ada di baris atas 
					$tax = $detail_order["subtotal"] * TAX;
					
                 ?>
                <tr>
                    <td class="total-table-title">Subtotal:</td>
                    <td>Rp. <?=number_format((float)$detail_order["subtotal"], 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td class="total-table-title">Shipping:</td>
                    <!-- di dapat dari AJAX rajaongkir -->
                    <td>Rp. <span id="result-ongkir"><?=number_format($detail_order["ongkir"])?></span></td>
                </tr>
                <tr>
                    <td class="total-table-title">TAX (10%):</td>
                    <td>Rp. <?=number_format((float)$tax, 2, '.', ',');?></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                    <td>Total:</td>
                    <td>Rp. 
                    <span id="result-grand-total">
                    <?=number_format((float)$detail_order["grand_total"],2,'.',',')?>
                    </span>
                    </td>
                    
                </tr>
              </tfoot>
          </table>
        
        
        </div>
	</form>
	
</div>
