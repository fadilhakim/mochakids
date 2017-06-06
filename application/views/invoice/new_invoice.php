<?php

  $due_intr = "1 weeks";
  
  $create_date= $order['create_date'];
  
  $effectiveDate = strtotime("+".$due_intr, strtotime($create_date));
  
  $due_date = date("Y-m-d H:i:s",$effectiveDate);
  
  $base_url = "http://www.mochakidshop.com";
  $image_url = "$base_url/assets/image/logo_mocha.png"; //img
  
  $date1 = date_create($order["create_date"]);
  
  
?>
<?php
 
?>
<div style="margin:0; padding:0; top:0; font-family:Verdana, Geneva, sans-serif; background-color:#CCC; color:#666" > 
  
  <div style="border:10px solid #00F; width:700px; margin-left:auto; margin-right:auto;  "></div>
  <div style="width:680px; margin-left:auto; margin-right:auto; background-color:#FFF; padding:20px">
  
  
     <div id="header">
       <div style="float:left; width:40%; font-size:16px; font-weight:bold">
       	  <div> Jl. KH. Hasyim ashari no.112 </div>
          <div> RT 02/02 Pinang Tangerang 15145 </div>
          <div> 0217317895 </div>
       </div>
       <div style="float:right; width:50%">
          <a href='<?=$base_url?>'><img src="<?=$image_url?>" style="width:95%"></a>
        
       </div>
     </div>
     <div id="body">
       <div style="clear:both"></div>
       <div class="devider" style="margin:40px 0"></div>
       <div style="color:#03F; font-size:30px"> Invoice #<?=$order["id_order"]?> </div>
       <div class="devider" style="margin:10px 0"></div>
       <div style="font-size:14px; font-weight:bold; color:#F0F"> Submitted on <?=$order["create_date"]?> </div>
        <div class="devider" style="margin:40px 0"></div>
       
       <div>
         <div style="float:left; width:40%; margin-right:10px; ">
         	<b> Invoice For </b>
            <div> <?=$user_detail["contact_person"]?> </div>
            <div> <?=$user_detail["email"]?></div>
         
         </div>
        
         <div style="float:left; width:50%; margin-right:10px;">
         	<b>Shipping information </b>
            <div> Province : </div>
            <div> City : </div>
            <div> Shipping Address : <br> 
            </div>
            <div> Post Code : </div>
            
            
            
         </div>
       </div>
       <div style="clear:both"></div>
       
       <div class="devider" style="margin:20px 0"></div>
       <hr />
        <div class="devider" style="margin:20px 0"></div>
        
        <table style="width:100%; border-collapse:collapse" border="1" cellpadding="5" >
        	<thead style="color:#03F; font-size:14px; font-weight:bold">
            	<tr>
            		<td width="250"> Product Title </td>
                    <td> SKU </td>
                    <td> Qty </td>
                	<td align="right"> Unit Price </td>
                	<td align="right"> Total Price </td>
                </tr>
            </thead>
           
        	<tbody>
            	<?php 
				foreach ($order_detail as $row){ 
				
					$product = $this->model_product->get_detail_product($row["product_id"]);
				?>
            	<tr>
                	<td> <?=$product["product_title"]?></td>
            		<td> <?=$product["product_code"]?> </td>
                	<td> <?=$row["qty"]?></td>
                    <td align="right"> <?=number_format($product["price"])?></td>
                    <td align="right"> <?=number_format($row["sub_total"])?></td>
                </tr>
                <?php
				}
				?>
                <tr>
            		<td rowspan=""> Notes:   </td>
                	<td ></td>
                    <td></td>
                    <td > Subtotal </td>
                    <td align="right"><?=number_format($order["subtotal"])?></td>
                </tr>
                <tr>
            		<td>    </td>
                	<td>&nbsp;  </td>
                    <td>&nbsp;  </td>
                    <td> Discount 0% </td>
                    <td align="right"> </td>
                </tr>
                <tr>
            		<td>    </td>
                	<td>&nbsp;  </td>
                    <td>&nbsp;  </td>
                    <td > PPN 10% </td>
                    <td align="right"><?=number_format(TAX * $order["subtotal"])?></td>
                </tr>
                
                <tr>
            		<td>&nbsp;  </td>
                	<td>&nbsp;  </td>
                    <td>&nbsp;  </td>
                    <td>Grand Total </td>
                    <td align="right"> <b style="font-size:18px; color:#F0C"><?=number_format($order["grand_total"])?>  </b> </td>
                </tr>
            </tbody>
        </table>
        
        <div class="devider" style="margin:40px 0"></div>
        
        <h4 style="font-size:16px;"> PAYMENT DETAIL </h4>
		 
        <div> Bank Name : BCA </div>
		<!-- <div> Bank Branch : TAMAN PALEM </div> -->
		<div> Bank Account Number :  </div>
		<div> Bank Account Name :  </div>
        
     </div><!-- body --> 
       
     
     
      
  </div>
</div>