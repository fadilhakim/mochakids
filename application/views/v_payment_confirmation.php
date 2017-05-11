<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<label style="color:red;">* Wajib Di isi</label>
	<hr>
	<form>
	 	<fieldset>
          <div class="form-group col-lg-12 required">
            <label class="col-md-2 col-sm-3 control-label" >Nomor Order</label>
            <div class="col-md-4 col-sm-6">
              <input type="type" name="no_order" id="input-name" placeholder="Nomor Order" class="form-control" />
              <span class="text-danger"><?php echo form_error('no_order'); ?></span>
            </div>
          </div><br><br>
          <div class="form-group col-lg-12 required">
            <label class="col-md-2 col-sm-3 control-label">Jumlah Pembayaran</label>
            <div class="col-md-4 col-sm-6">
              <input type="number" name="jumlah_pembayaran" value=""  placeholder="Jumlah Pembayaran" class="form-control" />
               <span class="text-danger"><?php echo form_error('jumlah_pembayaran'); ?></span>
            </div>
          </div><br><br>
          <div class="form-group col-lg-12 required">
            <label class="col-md-2 col-sm-3 control-label">Transfer Order (Rekening Bank Anda)</label>
            <div class="col-md-4 col-sm-9">
              <input type="text" name="user_bank"  placeholder="Nama Bank" class="form-control" /><br>
              <input type="text" name="user_bank_rekening" placeholder="No Rekening" class="form-control" /><br>
              <label class="control-label">Ke Rekening(Rekening Mocahkids Pilihan Anda)</label><br>
              <select class="form-control">
              	<option>BCA : 9012391</option>
              	<option>MANDIRI : 9012391</option>
              	<option>BNI : 9012391</option>
              </select>
            </div>
          </div>
          <br>
          <div class="form-group col-lg-12  required">
            <label class="col-lg-2 control-label">Upload Bukti Transfer</label>
            <div class="col-lg-8 ">
              <input type="file"  name="document">
              <span class="text-danger"><?php echo form_error('message'); ?></span>
            </div>
            <input class="col-lg-2 btn btn-primary" type="submit" value="Submit" />
          </div>
        </fieldset>
	</form>
	<hr>
</div>
