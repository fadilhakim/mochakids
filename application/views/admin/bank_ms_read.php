<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Bank_ms Read</h2>
        <table class="table">
	    <tr><td>Nama Bank</td><td><?php echo $nama_bank; ?></td></tr>
	    <tr><td>Rekening Bank</td><td><?php echo $rekening_bank; ?></td></tr>
	    <tr><td>Nama Pemilik</td><td><?php echo $nama_pemilik; ?></td></tr>
	    <tr><td>Logo Bank</td><td><?php echo $logo_bank; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ban') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>