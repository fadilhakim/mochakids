<?php $this->load->view("templates/meta")?>
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

</script>
<body class="container">
  <nav class="navbar navbar-default">
  	  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Raja Ongkir </a>
    </div>
    <div class="collapse navbar-collapse">
  		<ul class="nav navbar-nav">
        	<li class=""><a href="#"> Home </a></li>
        </ul>
    </div>
  </nav>
  <div class="container">
  	<div class="col-md-8">
    <h3> Test Rajaongkir </h3>
    <hr>
    <form class="form" role="form">
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
        
        	</select>
        </div>
    	
    
    </form>
    </div>
    <div class="col-md-4">
    
    
    </div>
  </div>
  <script>
  		
		
		
		
  		$(document).ready(function(e) {
            $("#id_province").change(function(){
			
				var id_province = $(this).val();
				city_province(id_province);	
			})
        });
  
  </script>
</body>
</html>