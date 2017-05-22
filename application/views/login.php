<div class="spacer30"></div><!--spacer-->
        <!--XXXXXXXXXX-- Wrapper-breadcrumbs --XXXXXXXXXX-->
      	<div class="wrapper-breadcrumbs clearfix">
       		<div class="container">
             	<div class="breadcrumbs-main clearfix">
                	<h2>Login</h2>
                   
             	</div>
          	</div>
     	  </div>

        <div class="wrapper-main brandshop clearfix">
          <div class="spacer30"></div><!--spacer-->
          <div class="container">
              <div class="inner-block"><!------Main Inner-------->
                  <div class="row">
                      <div class="sign-main"><!-- Start Sign -->
                            <div class="sign-details clearfix"><!-- Start Form -->
                              <div class="col-sm-6 contact-form">
                                  <div class="sign-block">
                                      <h4>Please login first </h4>
                                      <div class="panel panel-default">
                                        <div class="panel-body">
                                        <form method="post" action="<?php echo base_url('login/aksi_login_costumer'); ?>">
                                           		<div  class="form-group">
                                                    <?php echo $this->session->flashdata('message'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address <span>*</span></label>
                                                    <input type="text" id="email" class="form-control" name="email" placeholder="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass">Password <span>*</span></label>
                                                    <input type="password" id="pass" class="form-control" name="password" placeholder="password">
                                                </div>
                                                <input type="hidden" name="redirect" 
                                                value="<?=!empty($redirect) ? $redirect : ""?>" >
                                                <div>
                                                    <input style="line-height: inherit;
                                                    border-radius: 0px;
                                                    margin-top: 13px;
                                                    margin-bottom: 15px;
                                                    background: #FE8301;
                                                    color: #fff;
                                                    display: inline-block;
                                                    padding: 8px 10px;
                                                    text-align: center;
                                                    text-transform: uppercase;
                                                    width: auto;
                                                    width: 50%;" type="submit" name="login" class="" value="Login">
                                                </div>
                                            
                                        </form>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              <div class="col-sm-6 contact-form">
                                <div class="new-account">
                                  <div class="sign-block">
                                    <h4>Or Create new account here<br> <a href="<?php echo base_url("register"); ?>">Create Account</a></h4>
                                  </div>
                                  </div>
                              </div>
                            </div><!-- End Form -->
                        </div><!-- End Sign -->
                    </div>
                </div>
            </div>
            <div class="spacer30"></div><!--spacer-->
        </div>
        <!-------------- End wrapper main -------------->
