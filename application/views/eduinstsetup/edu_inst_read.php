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
        <h2 style="margin-top:0px">Edu_inst Read</h2>
        <table class="table">
	    <tr><td>Inst Name</td><td><?php echo $inst_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('eduinstsetup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>