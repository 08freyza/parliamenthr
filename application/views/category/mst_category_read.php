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
        <h2 style="margin-top:0px">Mst_category Read</h2>
        <table class="table">
	    <tr><td>Category</td><td><?php echo $category; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Creation Date</td><td><?php echo $creation_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('category') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>