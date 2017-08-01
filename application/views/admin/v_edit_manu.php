<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php foreach ($manu->result() as $row) {
    $manu_id=$row->manu_id;
    $manu_title=$row->manu_title;
    $manu_desc=$row->manu_desc;
    $manu_image=$row->manu_image;
    $manu_link=$row->manu_link;
} ?>
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Edit Brand</h4>
                    <div class="row">
                        <div class="col-lg-7">
                 
                            
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"><?php echo $manu_title; ?></h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/manu_f'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Brand Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $manu_id; ?>" name="manu_id" type="hidden">
                                            <input class="form-control" value="<?php echo $manu_title; ?>" name="manu_title" required placeholder="Change Title " type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Brand Image / Logo</label>

                                        <div class="col-sm-9">
                                            <img class="img-responsive" src="<?php echo base_url('assets/image/brand/'.$manu_image); ?>">
                                            <input class="form-control" value="<?php echo $manu_image; ?>" name="manu_image_old" type="hidden">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Change Image / Logo</label>

                                        <div class="col-sm-9">
                                            <input class="form-control" name="manu_image_new" type="file">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Change Image / Logo</label>

                                        <div class="col-sm-9">
                                            <textarea id="editor2" class="form-control" name="manu_desc" ><?php echo $manu_desc ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit";>
                                            Edit
                                        </button>
                                    </div>
                                </form>
                            </div>

                         <script type="text/javascript">
                            CKEDITOR.replace( 'editor2' );
                            CKEDITOR.add            
                        </script>
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