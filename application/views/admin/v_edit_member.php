<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php foreach ($member->result() as $row) {
    
      $user_id=$row->user_id;
      $username=$row->contact_person;
      $notlp=$row->no_tlp;
      $shippingaddress=$row->shipping_address;
      $email=$row->email;
}

?>
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Member</h4>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Edit Admin</h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/member_f'); ?>"  method="post">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">User Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $user_id; ?>" name="user_id" type="hidden">
                                            <input class="form-control" name="contact_person" value="<?php echo $username; ?>" required placeholder="User Name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="email" value="<?php echo $email; ?>" required placeholder="User Email" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">No Telephone</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="no_tlp" value="<?php echo $notlp; ?>" required placeholder="User Email" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Shipping address</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="shipping_address" value="<?php echo $shippingaddress; ?>" required placeholder="User Email" type="text">
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                            CKEDITOR.replace( 'editor3' );
                                            CKEDITOR.add            
                                    </script>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit";>
                                            Edit Member
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
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