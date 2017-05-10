<h4 class="header-title m-t-0 m-b-30">List Bank A</h4>

    <table class="table table-bordered table-striped" id="bank-table">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Logo Bank</th>
                  <th>Nama Bank</th>
                  <th>Rekening Bank</th>
                  <th>Nama Pemilik</th>
                  
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $start = 0;
              foreach ($bank_data as $bank)
              {
                  ?>
                  <tr>
                    <td><?php echo ++$start ?></td>
                    <td><img width="300" height="80" src="<?php echo ASSET_URL."image/bank/".$bank->logo_bank ?>"></td>
                    <td><?php echo $bank->nama_bank ?></td>
                    <td><?php echo $bank->rekening_bank ?></td>
                    <td><?php echo $bank->nama_pemilik ?></td>
                 
                    <td style="text-align:center" width="200px">
                    <a href="<?=site_url('bank/update/'.$bank->id_bank)?>" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5"> Update</a>
                    
                    <a href="<?=site_url('bank/delete/'.$bank->id_bank)?>" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5"
                    onClick="javasciprt: return confirm(\'Are You Sure ?\')">
                      Delete
                    </a>
                   
                    </td>
                  </tr>
                  <?php
              }
              ?>
              </tbody>
      </table>

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function () {
		alert(" test ");
		$("#bank-table").dataTable();
	});
</script>
    