<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">
                        <a href="<?php echo base_url('admin/product'); ?>" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5">Add New Product</a>
                        <a href="<?php echo base_url('admin/product-list'); ?>" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5">List Product</a>
                         <a href="<?php echo base_url('admin/product-category'); ?>" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5">Products Category</a>
                         <a href="<?php echo base_url('admin/category_po'); ?>" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5">Category PO</a>
                    </h4>
                    <div class="row">
                        <div class="col-lg-12" style="overflow:scroll;">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Product List</h4>
								<?=$this->session->flashdata("message")?>
                                <table id="datatable-keytable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Title</th>
                                            <th>Product Display</th>
                                            <th>Product Category</th>
                                            <th>Product Status</th>
                                            <th>Product Price</th>
                                            <th>Action / Product Detail</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach ($product as $p) { ?>
                                        
                                        <tr>
                                            <td><?php echo $i; $i++;?></td>
                                            <td><?php echo $p->product_title; ?></td>
                                            <td><img src="<?php echo base_url('assets/image/product/').$p->product_image_1; ?>" class="img-responsive"></td>
                                            <td><?php echo $p->product_category; ?></td>
                                            <td>
                                                <?php echo $p->product_availability; ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo number_format($p->price); ?>
                                            </td>
                                            <td>
                                                <a href="<?php  echo base_url('admin/edit_product'.'/'.$p->category_url.'/'.$p->product_slug); ?>" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5">Edit</a>
                                                <?php
                                                    $cek_rol = $this->session->userdata('role_id');

                                                    if($cek_rol == 1 ){ ?>
                                                    <a href="<?php echo base_url('admin/delete/product/'.$p->product_id); ?>" id="" class="delete-manu btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
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
        <!-- Plugin JS -->
        