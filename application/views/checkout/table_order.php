<table class="table cart-table">
  <thead>
      <tr>
          <th class="table-title">Product Name</th>
          <th class="table-title">Product Code</th>
          <th class="table-title">Unit Price</th>
          <th class="table-title">Quantity</th>
          <th class="table-title">SubTotal</th>
          <th><span class="close-button disabled"></span></th>
      </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
  <?php 
  
  foreach($this->cart->contents() as $items): $detail_product = $this->model_cart->getproductfromIdandCode($items['id'],$items['code'])->row();
      
  ?>
  <?php echo form_hidden('rowid[]', $items['rowid']); ?>
      <tr>
          <td class="product-name-col">
              <figure>
                 <!--  <a href="#"><img src="<?php /* <?= check_image_product($items['id']) ?> */?>" alt=""></a> -->
              </figure>
              <h2 class="product-name">
                  <a href="#"><?php echo $detail_product->product_title; ?></a>
              </h2>
              <!-- /<ul>
                  <li>Manufacturer: <?php //echo $items['manu']; ?></li>
              </ul>
              -->
          </td>
          <td class="product-code"><?php echo $items['code']; ?></td>
          <td class="product-price-col"><span class="product-price-special">Rp <?php echo $this->cart->format_number($items['price']); ?></span>
        
          </td>
          <td>
              <div class="custom-quantity-input">
                  <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'])); ?>
              </div>
          </td>
          <td class="product-total-col">
              <span class="product-price-special">Rp <?php echo $this->cart->format_number($items['subtotal']); ?></span>
          </td>
          <td>
              <a href="<?php echo base_url('cart/remove_item/').$items['rowid']; ?>" class="close-button">
                  <i class="fa fa-close"></i>
              </a>
          </td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
  </tbody>

</table>
<span class="clearfix"></span>
<div class="col-md-8">


</div>
<div class="col-md-4">
  <table class="table total-table">
      <tbody>
        <?php
          $cart_total = $this->cart->total();
          $sub_total = $cart_total * 0.1;
          $grand_total = $cart_total + $sub_total;

      ?>
          <tr>
              <td class="total-table-title">Subtotal:</td>
              <td>Rp. <?=number_format((float)$cart_total, 2, '.', ',');?></td>
          </tr>
          <tr>
              <td class="total-table-title">Shipping:</td>
              <td>Rp. 0</td>
          </tr>
          <tr>
              <td class="total-table-title">TAX (10%):</td>
              <td>Rp. <?=number_format((float)$sub_total, 2, '.', ',');?></td>
          </tr>
      </tbody>
      <tfoot>
          <tr>
              <td>Total:</td>
              <td>Rp. <?=number_format((float)$grand_total, 2, '.', ',');?></td>
          </tr>
      </tfoot>
  </table>
  <?php
      $email_sess = $this->session->userdata("email");
      $strbtnlogin = "data-toggle='modal' data-target='#login-modal' ";
       
  ?>
  <div class="md-margin"></div><!-- space -->
 
</div>
<span class="clearfix"></span>