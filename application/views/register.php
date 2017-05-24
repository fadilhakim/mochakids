<div class="spacer30"></div><!--spacer-->
<!--XXXXXXXXXX-- Wrapper-breadcrumbs --XXXXXXXXXX-->
<div class="wrapper-breadcrumbs clearfix">
    <div class="container">
        <div class="breadcrumbs-main clearfix">
            <h2>Sign Up</h2>
          
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
                      
                        <form action="<?=base_url("login/register_process")?>" method="post" role="form">
                            <div class="row">
                             <div class="col-md-12">
                              
                              <h4> Account Setting </h4>
                              <div class="col-md-5">	
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <input type="text" name="contact_person" id="contact_person" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                	<label> Password </label>
                                	<input type="password" name="password" id="password" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="email" name="email" id="email" class="form-control" value="" title="">
                                </div>
                                <div class="form-group">
                                	<label> Confirm Password </label>
                                	<input type="password" name="confirm_password" id="confirm-password" class="form-control">
                                </div>
                              </div>   
                              <span class="clearfix"></span> 
                              <hr>
                              
                              <h4> Contact Detail </h4>
                              <div class="col-md-5">
                               <div class="form-group">
                                <label> No Telp </label>
                                <input type="text" name="no_telp" id="no_telp" value="" class="form-control">
                               </div>
                               <div class="form-group">
                                <label> No Handphone </label>
                                <input type="text" name="no_hp" id="no_hp" value="" class="form-control">
                               
                               </div>
                              </div>
                              <div class="col-md-5">
                               <div class="form-group">
                                <label> No Fax </label>
                                 <input type="text" name="no_fax" id="no_fax" value="" class="form-control" >
                               </div>
                              
                              </div>
                              <span class="clearfix"></span>
                              <hr>
                        
                              <h4> Address </h4>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label> Billing Address </label>
                                    <textarea class="form-control" name="billing_address" id="billing_address"></textarea>
                                </div>
                              
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Shipping Address </label>
                                    <textarea name="shipping_address" id="shipping_address" class="form-control"></textarea>
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