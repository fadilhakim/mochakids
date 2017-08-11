<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php foreach ($category->result() as $row) {
    $category_po_id=$row->category_po_id;
    $category_po_title=$row->category_po_title;
    $category_po_image=$row->category_po_image;
    $expired=$row->expired;
    $display_date=$row->display_date;
    $status=$row->status;
} ?>
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Edit category PO</h4>
                    <div class="row">
                        <div class="col-lg-7">
                 
                            
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"><?php echo $category_po_title; ?></h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/category_po_f'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Category PO Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $category_po_id; ?>" name="category_po_id" type="hidden">
                                            <input class="form-control" value="<?php echo $category_po_title; ?>" name="category_po_title" required placeholder="Change Title " type="text">
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Close PO</label>
                                        <div class="col-sm-9">
                                            <input id="" class="form-control datepicker2" value="<?php echo $display_date; ?>" name="display_date" required placeholder="Change Title " type="text">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Close PO</label>
                                        <div class="col-sm-9">
                                            <input id="" class="form-control datepicker1" value="<?php echo $expired; ?>" name="expired" required placeholder="Change Title " type="text">
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Old Image</label>
                                        <div class="col-sm-9">
                                            <img src="<?php echo base_url('assets/image/product/category_po/').$category_po_image; ?>" class="img-responsive">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Select New Image</label>
                                        <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo $category_po_image; ?>" name="category_po_image_old" type="hidden">
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

<script>
    
    $(".datepicker1").datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat:"yy-mm-dd",
              minDate:0 
            });

     $(".datepicker2").datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat:"yy-mm-dd",
              minDate:0 
            });

</script>