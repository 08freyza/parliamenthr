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
        <h2 style="margin-top:0px">Comp_locat Read</h2>
        <table class="table">
	    <tr><td>Locat Desc</td><td><?php echo $locat_desc; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('locatsetup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>