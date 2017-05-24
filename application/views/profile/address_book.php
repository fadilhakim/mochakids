<div id="address_book">
	<h2> Address Book </h2>
    <hr>
    <span class="clearfix"></span>
    <a class="btn btn-primary" href="<?=base_url("profile/add_address_book")?>" style="margin-bottom:20px">
    	Add Address Book
    </a>
    <span class="clearfix"></span>
   
	<?php 
		foreach($address_list as $row){
	?>
    	<div class="panel panel-default col-md-4">
        	<div class="panel-heading">
            	<b><?=$row["contact_person"]?> </b>
            </div>
    		<div class="panel-body">
            	Billing Address : <br>
                <?=$row["billing_address"]?> <br>
            	
                Shipping Address : <br>
                <?=$row["shipping_address"]?> <br>
            
            </div>
    	</div>
    <?php
		}
	?>
    <span class="clearfix"></span>

</div>