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
<div id="add_address_book">
	<h2> Add Address Book </h2>
    <hr>
    <div><?=$this->session->flashdata("message");?></div>
    <form action="<?=base_url("profile/add_address_book_process")?>" role="form" method="post">
      <div class="row">
      	<h4> Contact </h4>
        
      	<div class="col-md-5">
            <div class="form-group">
                <label> Contact Person </label>
                <input type="text" name="contact_person" id="contact_person" class="form-control"> 
            
            </div>
        </div>
        <div class="col-md-5">
    		<div class="form-group">
            	<label> No Hp </label>
            	<input type="text" name="no_hp" id="no_hp" class="form-control">
            </div>
    
    	</div>
        <span class="clearfix"></span>
        <h4> Address </h4>
        
        <div class="col-md-5">
        	<div class="form-group">
        	<span> Province </span>
                  <select class="form-control" id="id_province" name="id_province">	
                      <?php foreach($province as $row){?>
                          <option value="<?=$row["province_id"]?>"><?=$row["province"]?></option>
                      <?php } ?>
                  </select>
              </div>
              
              <div class="form-group">
                  <span> City </span>
                  <select id="id_city" name="id_city" class="form-control">
              		  <option value="">- Select -</option>
                  </select>
              </div>
            <div class="form-group">
            	<label> Kecamatan </label>
            	<input type="text" name="kecamatan" id="kecamatan" class="form-control">
            </div>
            <div class="form-group">
            	<label> Kode Pos </label>
            	<input type="text" name="kode_pos" id="kode_pos" class="form-control" >
            </div>
        
        </div>
        <div class="col-md-5">
        	<div class="form-group">
            	<label> Shipping Address </label>	
        		<textarea name="shipping_address" id="shipping_address" class="form-control"></textarea>
            
            </div>
            <!-- <div class="form-group">
            	<label> Billing Address </label>
            	<textarea name="billing_address" id="billing_address" class="form-control"></textarea>
            </div> -->
        </div>
        <span class="clearfix"></span>
        <div class="col-md-10">
        <button class="btn btn-success pull-right"> Add </button>
        </div>
      </div>
    </form>
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



</div>