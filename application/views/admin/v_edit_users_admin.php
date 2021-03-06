<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php foreach ($admin->result() as $row) {
    
      $admin_id=$row->admin_id;
      $username=$row->username;
      $surename=$row->surename;
      $email=$row->email;
      $role_id=$row->role_id;
}

?>
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Admin</h4>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Edit Admin</h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/admin_f'); ?>"  method="post">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">User Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $admin_id; ?>" name="admin_id" type="hidden">
                                            <input class="form-control" name="username" value="<?php echo $username; ?>" required placeholder="User Name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Sure Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="surename" value="<?php echo $surename; ?>" required placeholder="Sure name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="email" value="<?php echo $email; ?>" required placeholder="User Email" type="text">
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                            CKEDITOR.replace( 'editor3' );
                                            CKEDITOR.add            
                                    </script>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit";>
                                            Add User
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