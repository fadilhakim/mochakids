<?php

?>
<div id="profile-content">
	<h2> Profile </h2>
    <hr>
    <div><?=$this->session->flashdata("message")?></div>
    <form action="<?=base_url("profile/edit_profile_process")?>" method="post" role="form">
    <div class="row">
     <div class="col-md-12">
     
      <div class="col-md-5">	
        <div class="form-group">
    		<label>Contact Person</label>
    		<input type="text" name="contact_person" id="contact_person" class="form-control" value="<?=$dt_profile["contact_person"]?>">
    	</div>
	  </div>
      <div class="col-md-5">
      	<div class="form-group">
        	<label> Email </label>
        	<input type="text" name="email" id="email" class="form-control" value="<?=$dt_profile["email"]?>" disabled title="Edit in Account Setting menu">
      	</div>
      </div>   
      <span class="clearfix"></span> 
      <hr>
      
      <h4> Contact Detail </h4>
      <div class="col-md-5">
       <div class="form-group">
      	<label> No Telp </label>
        <input type="text" name="no_telp" id="no_telp" value="<?=$dt_profile["no_tlp"]?>" class="form-control">
       </div>
       <div class="form-group">
       	<label> No Handphone </label>
        <input type="text" name="no_hp" id="no_hp" value="<?=$dt_profile["no_hp"]?>" class="form-control">
       
       </div>
      </div>
      <div class="col-md-5">
       <div class="form-group">
       	<label> No Fax </label>
         <input type="text" name="no_fax" id="no_fax" value="<?=$dt_profile["no_fax"]?>" class="form-control" >
       </div>
      
      </div>
      <span class="clearfix"></span>
      <hr>

      <!-- <h4> Address </h4>
      <div class="col-md-12">
      	<div class="form-group">
        	<label> Billing Address </label>
            <textarea class="form-control" name="billing_address" id="billing_address"></textarea>
      	</div>
      
      </div>
      <div class="col-md-12">
      	 <div class="form-group">
         	<label> Shipping Address </label>
         	<textarea name="shipping_address" id="shipping_address" class="form-control"></textarea>
         </div>
      
      </div> -->
     
      <span class="clearfix"></span>
      <div class="col-md-12">
      	<input type="submit" value="Edit Profile" class="btn btn-success pull-right">
      </div>
      <span class="clearfix"></span>
      
     </div>
    </div>
    </form>

</div>