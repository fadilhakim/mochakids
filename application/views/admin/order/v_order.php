<?php
	/*
		id_order
		id_user
		grand_total
		status
		create_date
		last_update
		ip_address
		user_agent
	
	*/

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title"> Order</h4>
                    
                    <div class="row">
                    	<div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">List Order</h4>

                                <table class="table table-bordered table-striped" id="datatable-keytable">
                                    <thead>
                                        <th> ID Order </th>
                                        <th> Name </th>
                                        <th> Grand Total </th>
                                        <th> Status </th>
                                        <th> Create Date </th>
                                        <th> Action </th>
                                    </thead>
                                    
                                    <tbody>
                                       <?php
									
									   ?>
                                       <tr>
                                        <td> &nbsp; </td>
                                        <td> &nbsp; </td>
                                        <td> &nbsp; </td>
                                        <td> &nbsp; </td>
                                        <td> &nbsp; </td>
                                        <td> &nbsp; </td>
                                       </tr>
                                       <?php
									   
									   ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?php $this->load->view("admin/footer");?>
        </div> <!-- container -->
    </div> <!-- content -->
</div>
