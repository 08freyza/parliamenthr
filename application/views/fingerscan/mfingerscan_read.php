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
        <h2 style="margin-top:0px">Mfingerscan Read</h2>
        <table class="table">
	    <tr><td>Sn</td><td><?php echo $sn; ?></td></tr>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Ip</td><td><?php echo $ip; ?></td></tr>
	    <tr><td>Port</td><td><?php echo $port; ?></td></tr>
	    <tr><td>Deviceid</td><td><?php echo $deviceid; ?></td></tr>
	    <tr><td>Key</td><td><?php echo $key; ?></td></tr>
	    <tr><td>Scheduled</td><td><?php echo $scheduled; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fingerscan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>