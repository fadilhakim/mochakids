<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Admin Users</h4>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Add Admin</h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/add/users'); ?>"  method="post">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">User Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="username" required placeholder="User Name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="surename" required placeholder="Sure name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="email" required placeholder="User email (Please input valid email to be confirm)" type="text">
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                            CKEDITOR.replace( 'editor3' );
                                            CKEDITOR.add            
                                    </script>
                                    <div class="form-group text-right m-b-0">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <?php echo $this->session->flashdata('msg'); ?>
                                            </div>
                                            <div class="col-xs-6">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit";>
                                                    Add User
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Admin users List</h4>

                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username Admin</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($users as $us) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; $i++;?></th>
                                            <td><?php echo $us->username; ?></td>
                                            <td><?php echo $us->email; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/edit/admin/'.$us->admin_id); ?>" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5">Edit</a>
                                                <?php if($us->role_id == 1) { ?>    
                                                    &nbsp;
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('admin/delete/users/'.$us->admin_id); ?>" id="" class="delete-event btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
                                                <?php } ?>
                                                
                                            </td>
                                        </tr>

                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
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