<?php
	$dt_subcontent = !empty($dt_subcontent) ? $dt_subcontent : array();
?>
<div class="wrapper-main clearfix">
          <div class="spacer30"></div><!--spacer-->
          <div class="container">
              <div class="inner-block"><!------Main Inner-------->
                  <div class="row">
                  
                      <div class="col-md-3">
                          <?php $this->load->view("profile/sidebar");?>    
                      </div>
                      <div class="col-md-9">
                          <?php $this->load->view($subcontent,$dt_subcontent);?>
                      </div>
                  </div>
              </div>
         </div>
</div>