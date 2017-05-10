<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Bank</h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"> Add Bank </h4>
                                <div><?=$this->session->flashdata("message");?></div>
                                <form action="<?=base_url("Bank/create_action")?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="varchar">Nama Bank</label>
                                        <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Rekening Bank</label>
                                        <input type="text" class="form-control" name="rekening_bank" id="rekening_bank" placeholder="Rekening Bank" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Nama Pemilik </label>
                                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Logo Bank </label>
                                        <input type="file" name="logo_bank" id="logo_bank">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary">Add Bank </button> 
                                    <a href="<?php echo site_url('bank') ?>" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-10">
                            <div class="card-box">
                                <?php $this->load->view("admin/bank_ms_list"); ?>
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