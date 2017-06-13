<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    <div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Member List</h4>
                                <table id="datatable-buttons" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Contact Person</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; foreach ($members as $sb ) {?>
                                                
                                            <tr>
                                                <td><?php echo $i; $i++;?></td>
                                                <td><?php echo $sb->contact_person; ?></td>
                                                <td><?php echo $sb->no_tlp; ?></td>
                                                <td><?php echo $sb->email; ?></td>
                                                <td>
                                                <a href="<?php echo base_url('admin/edit/member/').$sb->user_id; ?>" id="" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5">Edit Member</a>

                                                <a href="<?php echo base_url('admin/delete/member/').$sb->user_id; ?>" id="" class="delete-manu btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete Member</a>
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