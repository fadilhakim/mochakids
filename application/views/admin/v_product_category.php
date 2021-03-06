<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Products Category</h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Add Category Product</h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/add/category_product'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="category_name" required placeholder="Category Name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Category Image</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="image" required placeholder="Category Name" type="file">
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

                                <table id="datatable-keytable" class="table table-striped m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($category as $c) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; $i++;?></th>
                                            <td><?php echo $c->category_title; ?></td>
                                            <td>
                                <img class="img-responsive" src="<?php echo base_url('assets/image/product/category/'.$c->image)?>">
                                            </td>
                                            <td>
                                            <a href="<?php echo base_url('admin/edit/category/'.$c->category_id); ?>" id="" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5">Update</a>

                                                <a href="<?php echo base_url('admin/delete/category/'.$c->category_url); ?>" id="" class="delete-category btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
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