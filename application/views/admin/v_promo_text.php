<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title"></h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Edit Promo Text</h4>
                                <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo base_url('admin/edit/promo_f'); ?>"  method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Promo Text</label>
                                        <div class="col-sm-9">
                                         <?php foreach ($promo as $p) { ?>
                                            <input class="form-control" value="<?php echo $p->promo_text ?>" name="promo_text" required placeholder="promo_text" type="text">
                                        <?php } ?>
                                        </div>
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="col-sm-3 control-label" style="text-align:left;">Brand Logo</label>
                                        <div class="col-sm-9">
                                            <input class="" name="manu_image" type="file">
                                        </div>
                                    </div> -->

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit";>
                                            Edit Promo Text
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">

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