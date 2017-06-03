<?php // di include ke profile/order_detail ?>
<fieldset>
    <div class="form-group col-lg-12 required">
      <label>Nomor Order</label>
      
        <input type="text" name="no_order" id="input-name" readonly placeholder="Nomor Order" class="form-control" value="<?=$this->uri->segment(4)?>" />
      
    </div>
    <div class="form-group col-lg-12 required">
      <label class="control-label">Jumlah Pembayaran</label>
      
        <input type="number" name="jumlah_pembayaran" value="<?=$payment["jumlah_dana"]?>"  placeholder="Jumlah Pembayaran" class="form-control" readonly/>
     
    </div>
    <div class="form-group col-lg-12 required">
      <label class="control-label">Transfer Order (Rekening Bank Anda)</label>
     
        <input type="text" name="user_bank"  placeholder="Nama Bank" class="form-control" value="<?=$payment["bank"]?>" readonly/><br>
        <input type="text" name="user_bank_rekening" placeholder="No Rekening" class="form-control" value="<?=$payment["no_rekening"]?>" readonly/>
        <br>
        <input type="text" name="atas_nama" placeholder="a/n (Nama Pemilik akun Bank)" class="form-control" value="<?=$payment["nama_pemilik"]?>" readonly>
        
        <br>
        <label class="control-label">Ke Rekening(Rekening Mocahkids Pilihan Anda)</label><br>
       
        <input type="text" name="nama_bank" class="form-control" value="<?=$bank_dt["nama_bank"]?> : <?=$bank_dt["rekening_bank"] ?> a/n <?=$bank_dt["nama_pemilik"]?>" readonly/>
      
    </div>
    <br>
    <div class="form-group col-lg-12  required">
      <label class="control-label">Upload Bukti Transfer</label>
   	  <div>
      <?php if(!empty($payment["bukti_transfer"])){ ?>
      <img src="<?=base_url("assets/image/payment_conf/$payment[bukti_transfer]")?>" width="200" height="150">
      <?php } else { echo "No Bukti Transfer"; }?>
      </div>
     
    </div>
    
  </fieldset>