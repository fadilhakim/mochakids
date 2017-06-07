<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php foreach ($category->result() as $row) {
    $category_id=$row->category_id;
    $category_title=$row->category_title;
    $category_image=$row->image;
} ?>
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Edit category</h4>
                    <div class="row">
                        <div class="col-lg-7">
                 
                            
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"><?php echo $category_title; ?></h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/category_f'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Title category</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $category_id; ?>" name="category_id" type="hidden">
                                            <input class="form-control" value="<?php echo $category_title; ?>" name="category_title" required placeholder="Change Title " type="text">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Old Image</label>
                                        <div class="col-sm-9">
                                            <img src="<?php echo base_url('assets/image/product/category/').$category_image; ?>" class="img-responsive">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Select New Image</label>
                                        <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $category_image; ?>" name="silder_image_old" type="hidden">
                                            <input class="" name="category_image_new" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit";>
                                            Edit category
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

   