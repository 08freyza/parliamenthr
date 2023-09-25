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
        <h2 style="margin-top:0px">Emp_award Read</h2>
        <table class="table">
	    <tr><td>Award No</td><td><?php echo $award_no; ?></td></tr>
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Award Category</td><td><?php echo $award_category; ?></td></tr>
	    <tr><td>Award Cert</td><td><?php echo $award_cert; ?></td></tr>
	    <tr><td>Award Date</td><td><?php echo $award_date; ?></td></tr>
	    <tr><td>Remark</td><td><?php echo $remark; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('awardhistory') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>