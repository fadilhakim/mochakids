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
<form action="<?=base_url("checkout/shipping_address_process")?>" method="post">
 <div class="form-group col-md-5">
 	 <label> Choose Address Book </label>
     <select class="form-control" id="address_book">
     	<option value=""> - Select -</option>
     </select>
 </div>
 <span class="clearfix"></span>
 <hr>
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
      <input type="text" name="kecamatan" id="kecamatan" class="form-control">
    </div>
    <div class="form-group">
      <label> Kode Pos </label>
      <input type="text" name="kode_pos" id="kode_pos" class="form-control">
    </div>
</div>
<div class="col-md-5">
    <div class="form-group">
        <label> Shipping Address </label>	
        <textarea name="shipping_address" id="shipping_address" class="form-control"></textarea>
    
    </div>
    <div class="form-group">
        <label> Billing Address </label>
        <textarea name="billing_address" id="billing_address" class="form-control"></textarea>
    </div>
    
</div>
<span class="clearfix"></span>
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