<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Pre Order Category</h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Add PO Category</h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/add/category_po'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Category PO Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="category_po_title" required placeholder="Category Name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Category PO Image</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="image" required placeholder="Category Name" type="file">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Close PO</label>
                                        <div class="col-sm-9">
                                            <input class="form-control datepicker1" name="expired" required placeholder="Close PO" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group text-right m-b-0">
                                        <button id="sa-success-slider" class="btn btn-primary waves-effect waves-light" type="submit";>
                                            Add Category
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-10">
                    <?php if ($message != '') {?>
                    <div class="alert alert-danger fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>Danger!</strong> <?php echo $message; ?>
                    </div>
                    <?php } else {} ?>
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">List Category</h4>

                                <table  id="datatable-keytable" class="table table-striped m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category PO Title</th>
                                            <th>Category PO Image</th>
                                            <th>Close PO</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($po as $c) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; $i++;?></th>
                                            <td><?php echo $c->category_po_title; ?></td>
                                            <td>
                                <img class="img-responsive" src="<?php echo base_url('assets/image/product/category_po/'.$c->category_po_image)?>">
                                            </td>
                                            <td>
                                               <?php echo $c->expired; ?>
                                            </td>
                                            <td> 
                                            <?php $date1 = str_replace('-', '',date('Y-m-d')) ?>
                                            <?php $date2 = str_replace('-', '',$c->expired); ?>

                                            <?php if ($date1  <= $date2) { ?>
                                                <strong style="color:green">Active</strong>
                                            <?php } else { ?>
                                                 <strong style="color:red">Unactive</strong>
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <a href="<?php echo base_url('admin/edit/category_po/'.$c->category_po_id); ?>" id="" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5">Update</a>

                                                <a href="<?php echo base_url('admin/delete/category_po/'.$c->category_po_url); ?>" id="" class="delete-category btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
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

<script>
    
    $(".datepicker1").datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat:"yy-mm-dd",
              minDate:0 
            });

</script>