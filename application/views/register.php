<?php
	$post_data = $this->session->flashdata("post_data");
?>
<script>
	function city_province(id_province)
	{
		$.ajax({
			type:"POST",
			url:"<?=base_url("ajax/list_city_province")?>",
			data:"id_province="+id_province,
			success: function(data)
			{
				$("#id_city").html(data);
			}
		})
		
	}
	
	function dt_city(id_city)
	{
		$.ajax({
			type:"POST",
			url:"<?=base_url("ajax/dt_city");?>",
			data:"id_city="+id_city,
			dataType:"JSON",
			success: function(data)
			{
				
				$("#kode_pos").val(data.postal_code);	
			}
		
		});
	}

</script>

<div class="spacer30"></div><!--spacer-->
<!--XXXXXXXXXX-- Wrapper-breadcrumbs --XXXXXXXXXX-->
<div class="wrapper-breadcrumbs clearfix">
    <div class="container">
        <div class="breadcrumbs-main clearfix">
            <h2>Register</h2>
          
        </div>
    </div>
</div>

<div class="wrapper-main brandshop clearfix">
  
  <div class="container">
      <div class="inner-block"><!------Main Inner-------->
          <div class="row">
              <div class="sign-main"><!-- Start Sign -->
                    <div class="sign-details clearfix"><!-- Start Form -->
                      <div class="col-sm-12 contact-form">
                      
                      <div class="panel panel-default">
                      	<div class="panel-body">	
                      	<div><?=$this->session->flashdata("message");?></div>
                        <form action="<?=base_url("login/register_process")?>" method="post" role="form">
                            <div class="row">
                             <div class="col-md-12">
                              
                              <h4> Account Setting </h4>
                              <div class="col-md-5">	
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?=$post_data["contact_person"]?>">
                                </div>
                                <div class="form-group">
                                	<label> Password </label>
                                	<input type="password" name="password" id="password" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?=$post_data["email"]?>" title="">
                                </div>
                                <div class="form-group">
                                	<label> Confirm Password </label>
                                	<input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                </div>
                              </div>   
                              <span class="clearfix"></span> 
                              <hr>
                              
                              <h4> Contact Detail </h4>
                              <div class="col-md-5">
                               <div class="form-group">
                                <label> No Telp </label>
                                <input type="text" name="no_telp" id="no_telp" value="<?=$post_data["no_telp"]?>" class="form-control">
                               </div>
                               <div class="form-group">
                                <label> No Handphone </label>
                                <input type="text" name="no_hp" id="no_hp" value="<?=$post_data["no_hp"]?>" class="form-control">
                               
                               </div>
                              </div>
                              <div class="col-md-5">
                               <div class="form-group">
                                <label> No Fax </label>
                                 <input type="text" name="no_fax" id="no_fax" value="<?=$post_data["no_fax"]?>" class="form-control" >
                               </div>
                              
                              </div>
                              <span class="clearfix"></span>
                              <hr>
                        
                              <h4> Address </h4>
                              <div class="col-md-5">
                                  <div class="form-group">
                                    <label> Province </label>
                                    <select class="form-control" id="id_province" name="id_province">	
                                        <?php foreach($province as $row){?>
                                        <option value="<?=$row["province_id"]?>"><?=$row["province"]?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label> City </label>
                                    <select id="id_city" name="id_city" class="form-control">
                                    <option value="">- Select -</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label> Kecamatan </label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?=$post_data["kecamatan"]?>">
                                  </div>
                                  <div class="form-group">
                                    <label> Kode Pos </label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control" value="<?=$post_data["kode_pos"]?>">
                                  </div>
                              </div>
                              <div class="col-md-5">
                                  <div class="form-group">
                                      <label> Shipping Address </label>	
                                      <textarea name="shipping_address" id="shipping_address" class="form-control"><?=$post_data["shipping_address"]?></textarea>
                                  
                                  </div>
                                  <div class="form-group">
                                      <label> Billing Address </label>
                                      <textarea name="billing_address" id="billing_address" class="form-control"><?=$post_data["billing_address"]?></textarea>
                                  </div>
                                  
                              </div>
                             
                              <span class="clearfix"></span>
                              
                              
                              <div class="col-md-12">
                                <input type="submit" value="Sign Up" class="btn btn-success pull-right">
                              </div>
                              <span class="clearfix"></span>
                              
                             </div>
                            </div>
                            </form>
                        
                        </div>
                      </div>
                      
                      </div>
                    </div>
                    
              </div>
          </div>
          
      </div>
      
  </div>
  
</div>

<script>
	$(document).ready(function(e) {
		
			var id_province = $("#id_province").val();
			var id_city = $("#id_city").val();
			city_province(id_province);	
			dt_city(id_city);
		
		$("#id_province").change(function(){
		
			var id_province = $(this).val();
			var id_city = $("#id_city").val();
			city_province(id_province);	
			dt_city(id_city);
		});
		
		$("#id_city").change(function(){
			
			var id_city = $(this).val();
			dt_city(id_city);
			
			
		});
	});


</script>