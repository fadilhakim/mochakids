<div id="account_setting">
	<h2> Account Setting </h2>
    <hr>
	<div><?=$this->session->flashdata("message");?></div>
    <form role="form" action="<?=base_url("profile/account_setting_process")?>" method="post">
      <div class="col-md-7">
    	<div class="form-group">
        	<label> Email </label>
            <input type="email" name="email" id="email" value="<?=$dt_account["email"]?>" class="form-control">
        </div>
        <div class="form-group">
        	<label> Old Password </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="wajib diisi">
        
        </div>
        <div class="form-group">
        	<label> New Password </label>
        	<input type="password" name="new_password" id="new_password" class="form-control">
        </div>
        <div class="form-group">
        	<label> Confirm New Password </label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="wajib diisi kalau new password di set ">
        </div>
    	
        
        
        <input type="submit" value="Change Account" class="btn btn-primary pull-right">
        <span class="clearfix"></span>
      </div>
    </form>
</div>