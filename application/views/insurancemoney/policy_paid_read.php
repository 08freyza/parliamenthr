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
        <h2 style="margin-top:0px">Policy_paid Read</h2>
        <table class="table">
	    <tr><td>Policy Id</td><td><?php echo $policy_id; ?></td></tr>
	    <tr><td>Client Id</td><td><?php echo $client_id; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Teneur</td><td><?php echo $teneur; ?></td></tr>
	    <tr><td>Paiddate</td><td><?php echo $paiddate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('insurancemoney') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>