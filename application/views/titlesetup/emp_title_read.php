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
        <h2 style="margin-top:0px">Emp_title Read</h2>
        <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Title Code</td><td><?php echo $title_code; ?></td></tr>
	    <tr><td>Report To</td><td><?php echo $report_to; ?></td></tr>
	    <tr><td>Colour</td><td><?php echo $colour; ?></td></tr>
	    <tr><td>Code</td><td><?php echo $code; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('titlesetup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>