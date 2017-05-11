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
                                <h4 class="header-title m-t-0 m-b-30"> Update Bank </h4>
                                <div><?=$this->session->flashdata("message");?></div>
                                
                                
                                <form action="<?=base_url("Bank/update_action")?>" method="post" enctype="multipart/form-data">
                                
                                <input type="hidden" value="<?=$bank["id_bank"]?>" name="id_bank">
                                    <div class="form-group">
                                        <label for="varchar">Nama Bank</label>
                                        <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="<?=$bank["nama_bank"]?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Rekening Bank</label>
                                        <input type="text" class="form-control" name="rekening_bank" id="rekening_bank" placeholder="Rekening Bank" value="<?=$bank["rekening_bank"]?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Nama Pemilik </label>
                                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?=$bank["nama_pemilik"]?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Logo Bank </label>
                                        <br>
                                        <img src="<?=ASSET_URL."image/bank/$bank[logo_bank]"?>" width="300" height="80">
                                        <input type="file" name="logo_bank" id="logo_bank">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary">Update Bank </button> 
                                    <a href="<?php echo site_url('bank/update') ?>" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-10">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">List Bank</h4>

                                <?php $this->load->view("admin/bank_ms_list");?>
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