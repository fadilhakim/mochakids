<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="page-title">Pilih Menu :</h4>
                    <div class="row">
                        <?php
                            if($this->session->userdata('role_id')==1){ ?>
                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/users_admin'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Admin Users
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/members'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Members
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                        

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/slider'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Sliders
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                  
                    
                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/product'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Products
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/po_info/1'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        PO Information Text
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/brand'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Brands
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/promo/1'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Promo Text Home
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>



                
                        <!-- <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/event'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Event
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div> -->
                        
                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/order'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Order
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                        <div class="col-lg-4">
                            <a href="<?php echo base_url('bank'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Bank
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                         <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/contact'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Contact Admin
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/return/1'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Return Info
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/htb/1'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        How To Buy Info
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/about/1'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        About Info
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                        <!-- <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/news'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        News
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>-->
                    

                    
                        <!-- <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/client'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Clients
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                    

                    
                        <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/susbscriber'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Susbscribers
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>
                    

                    
                         -->

                       
                        <?php } ?>

                        <?php
                            if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==3 ){ ?>
                         <!-- <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/discount'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Voucher Discount
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div> -->

                        <?php } ?>

                        <!-- <div class="col-lg-4">
                            <a href="<?php echo base_url('admin/sparepart'); ?>">
                            <div class="card-box widget-user">
                                <div class="text-center">
                                    <h5>
                                        Spareparts
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div> -->



                    </div>
                </div>
            </div>
            <!-- end row -->
            <footer class="footer">
                2017 © Mocha Kids | Go To : <a href="<?php echo base_url('home'); ?>" target="_blank" class="text-muted">mochakidshop.com</a>
            </footer>
        </div> <!-- container -->
    </div> <!-- content -->



</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


    
        
        
