<?php
	/*
		id_order
		id_user
		grand_total
		status
		create_date
		last_update
		ip_address
		user_agent
	
	*/

?>
<script>
	
	function change_status(stat)
	{
		var id_order = "<?=$detail_order["id_order"]?>";
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("order/change_status_modal")?>",
			data:"id_order="+id_order+"&status="+stat,
			success: function(data)
			{
				$("#order_temp").html(data);
				
			
			}
			
		})
		
		
		
	}


</script>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title"> <span class="pull-left"> <strong>#<?=$detail_order["id_order"]?></strong></span>
                    </h4>
                    
                    <span class="pull-right">
      <div class="dropdown"><button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> status : <?=$detail_order["status"]?> <span class="caret"></span> </button>
       <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#" onClick="change_status('pending')">Pending</a></li>
        <li><a href="#" onClick="change_status('confirm')">Confirm</a></li>
        <li><a href="#" onClick="change_status('shipping')">Shipping</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#" onClick="change_status('delivered')">Delivered</a></li>
      </ul>
      </div>
      </span>
                    <span class="clearfix"><br></span>
                    <div class="row">
                    	<div class="col-lg-12">
                            <div class="card-box">
                            	<span id="order_temp"></span>
                               <?=$this->session->flashdata("message");?>
      
                                <div class="table-responsive">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <td class="text-center">Image</td>
                                        <td class="text-left">Product Name</td>
                                        <td class="text-left">Product Code</td>
                                        <td class="text-left">Quantity</td>
                                        <td class="text-right">Unit Price</td>
                                        <td class="text-right">Sub Total</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      foreach($detail_list_order as $row)
                                      {
                                          
                                          $product = $this->model_product->get_detail_product($row["product_id"]);
                                          $url_product = base_url("product/$product[product_id]/$product[product_category]/$product[product_slug]");  
                                      ?>
                                      <tr>
                                      
                                        <td class="text-center"><a href="<?=$url_product?>" target="_blank"><img height="100" width="80"  src="<?=base_url("assets/image/product/$product[product_image_1]")?>" alt="<?=$product["product_title"]?>" title="<?=$product["product_title"]?>" class="img-thumbnail" /></a>
                                       
                                        </td>
                                        <td class="text-left"><a href="<?=$url_product?>" target="_blank"> <?=$product["product_title"]?> </a><br />
                                         </td>
                                        <td class="text-left"><?=$product["product_code"]?></td>
                                        <td class="text-left"><div class="input-group btn-block quantity">
                                           <?=$row["qty"]?></div>
                                        <td class="text-right">Rp. <?=number_format($product["price"])?></td>
                                        <td class="text-right">Rp. <?=number_format($row["sub_total"])?></td>
                                      </tr>
                                      <?php
                                      }
                                      ?>
                                    </tbody>
                                  </table>
                                </div>
                              <h3> Payment Confirmation </h3>
                              <form method="post" id="form-confirm" action="<?=base_url("checkout/payment_process")?>">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h3 class="panel-title">
                                      <span class="pull-left"> Status: </span> <span class="pull-right">
                                      <span class="label label-default">
                                       <?=isset($payment["status"]) ? $payment["status"] : "waiting for confirmation" ?> </span> </span> </h3>
                                      <span class="clearfix"></span>
                                    </div>
                                    <div id="collapse-coupon" class="panel-collapse collapse in">
                                      <div class="panel-body">
                                          <?php
                                           if(empty($payment))
                                           {
                                          ?>
                                                <div> Waiting for Payment confirmation ... </div>
                                          <?php
                                           }
                                           else if(!empty($payment))
                                           {
                                               $data["bank_dt"] = $bank_dt;
                                               $data["payment"] = $payment;
                                               $this->load->view("admin/order/v_fix_payment_conf",$data);   
                                           }
                                          ?>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        
                                <div class="col-sm-6">
                                  <table class="table table-bordered">
                                    <tr>
                                      <td class="text-right"><strong>Sub-Total:</strong></td>
                                      <td class="text-right"><h4>Rp. <?=number_format($detail_order["subtotal"])?> </h4></td>
                                    </tr>
                                    <tr>
                                      <td class="text-right"><strong>Ongkir :</strong></td>
                                      <td class="text-right"><h4>Rp. <?=number_format($detail_order["ongkir"])?></h4></td>
                                    </tr>
                                    <tr>
                                      <td class="text-right"><strong>TAX (<?=TAX_TEXT?>):</strong></td>
                                      <td class="text-right"><h4>Rp. <?=number_format(TAX * $detail_order["subtotal"])?></h4></td>
                                    </tr>
                                    <tr>
                                      <td class="text-right"><strong>Grand Total:</strong> <br>( jumlah pembayaran )</td>
                                      <td class="text-right"><h4 class="text-success">Rp. <?=number_format($detail_order["grand_total"])?></h4></td>
                                    </tr>
                                  </table>
                                </div>
                             
                              </div>
                            
                                
                              <div class="buttons">
                                                               
                                     <div class="pull-right"><a href="<?=base_url("admin/order")?>" class="btn btn-primary"> Back to Order </a></div>
                                 
                              </div>
                              </form>
                              <span class="clearfix"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?php $this->load->view("admin/footer");?>
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<!--Middle Part Start-->
    
<script>



</script>
<!--Middle Part End -->