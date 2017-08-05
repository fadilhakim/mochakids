<?php
	$total_weight = $this->model_cart->weight_total();
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
	
	function detail_cost(origin,destination,weight,courier)
	{
		origin = 152;
		
		$.ajax({	
			type:"POST",
			url:"<?=base_url("ajax/list_result_ongkir")?>",
			data:"origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
			success: function(data)
			{
				$("#layanan_kurir").html(data);
		
			}
		});
		
		
	}
	
	function load_data_address(user_add_id)
	{			
		$.ajax({	
			type:"POST",
			url:"<?=base_url("ajax/load_data_address")?>",
			data:"user_add_id="+user_add_id,
			dataType:"JSON",
			success: function(data)
			{				
				$("#contact_person").val(data.contact_person);
				$("#no_hp").val(data.no_hp);
				
				$("#id_province option[value="+data.provinsi+"]").attr('selected','selected');
				city_province(data.provinsi);
				$("#id_city").val(data.kota);
				
				$("#kecamatan").val(data.kecamatan);
				$("#kode_pos").val(data.kode_pos);
				$("#shipping_address").val(data.shipping_address);
				
				$("#save_address_book").prop("disabled",true);
		
			}
		});
	}
	
	

</script>

<!-- <form action="<?=base_url("checkout/shipping_address_process")?>" method="post"> -->
 <div class="form-group col-md-5">
 	 <label> Choose Address Book </label>
     <select class="form-control" id="address_book" name="address_book">
     	<option value=""> - Select -</option>
        <?php
			foreach($address_book as $row){
		?>
        	<option value="<?=$row["user_add_id"]?>"><?=$row["contact_person"]?></option>
        <?php
			}
		?>
     </select>
 </div>
 <span class="clearfix"></span>
 <hr>
 <div class="col-md-5">
   <div class="form-group">
       <label> Contact Person </label>
       <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?=$this->session->userdata("contact_person");?>" >
   </div>
 </div>
 <div class="col-md-5">
   <div class="form-group">
   	   <label> No. Hp </label>
       <input type="text" name="no_hp" id="no_hp" class="form-control">
   </div>
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
       <label> Kurir </label>
       <select class="form-control" name="kurir" id="kurir">
       		<option value=""> -Select Kurir - </option>
           
       		<option value="jne"> JNE </option>
            <option value="tiki"> TIKI </option>
            <option value="pos"> POS </option>
            <option value="pick_up"> Pick Up - in Store </option>
       </select>
       
       <input type="hidden" name="total_weight" id="total_weight" value="<?=$total_weight?>">
     
    </div>
    <div class="form-group">
    	<label> Layanan Kurir </label>
    	<select class="form-control" name="layanan_kurir" id="layanan_kurir">
        	<option value=""> - Select - </option>
        </select>
        <input type="hidden" name="ongkir" id="ongkir" value="0" >
    
    </div>
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
<div class="checkbox">
    <label>
      <input type="checkbox" name="save_address_book" id="save_address_book"> Save this Adress
    </label>
    </div>
<!-- </form> -->
<script>

	function change_shipping()
	{
		var layanan_kurir = $("#layanan_kurir").val();
	
		var ongkir = 0;
		
		if( layanan_kurir != 0 )
		{
		  
		  var ongkir = layanan_kurir.split("&");
		  var ongkir2 = ongkir[1];
		}
		else
		{
	 	  
		  var ongkir2 = 0;
		}
		
		  $.ajax({
			  type:"POST",
			  url:"<?=base_url("ajax/load_shipping_data")?>",
			  data:"ongkir="+ongkir2,
			  dataType:"JSON",
			  success:function(dt)	
			  {
				  $("#result-grand-total").html(dt.grand_total);	
				  $("#result-ongkir").html(dt.shipping);
				  
			  }
		  });
		
		
		
	}
	
	$(document).ready(function(e) {
		
			var id_province = $("#id_province").val();
			var id_city = $("#id_city").val();
			var origin = 152; // default
			var destination = $("#id_city").val();
			var weight = $("#total_weight").val();
			var courier = $("#kurir").val();
			
			city_province(id_province);	
			dt_city(id_city);
			detail_cost(origin,destination,weight,courier);
			
		
		$("#address_book").change(function(){
			
			//alert("aaa");
			
			var address_book = $("#address_book").val();
			
			load_data_address(address_book);
		});
		
		$("#id_province").change(function(){
		
			var id_province = $(this).val();
			var id_city = $("#id_city").val();
			
			var origin = 152; // default
			var destination = $("#id_city").val();
			var weight = $("#total_weight").val();
			var courier = $(this).val();
			
			
			
			city_province(id_province);	
			dt_city(id_city);
			detail_cost(origin,destination,weight,courier);
		});
		
		$("#id_city").change(function(){
			
			var id_city = $(this).val();
			var origin = 152; // default
			var destination = $("#id_city").val();
			var weight = $("#total_weight").val();
			var courier = $(this).val();
			
			dt_city(id_city);
			detail_cost(origin,destination,weight,courier);
		});
		
		$("#kurir").change(function(){
			
			var origin = 152; // default
			var destination = $("#id_city").val();
			var weight = $("#total_weight").val();
			var courier = $(this).val();
			
			
			detail_cost(origin,destination,weight,courier);
			change_shipping();
			
		});
		
		$("#layanan_kurir").change(function(){
			
			
			
			change_shipping();
			
		})
	});


</script>