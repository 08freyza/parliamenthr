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
        <h2 style="margin-top:0px">Uc_users Read</h2>
        <table class="table">
	    <tr><td>User Name</td><td><?php echo $user_name; ?></td></tr>
	    <tr><td>Display Name</td><td><?php echo $display_name; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Activation Token</td><td><?php echo $activation_token; ?></td></tr>
	    <tr><td>Last Activation Request</td><td><?php echo $last_activation_request; ?></td></tr>
	    <tr><td>Lost Password Request</td><td><?php echo $lost_password_request; ?></td></tr>
	    <tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Sign Up Stamp</td><td><?php echo $sign_up_stamp; ?></td></tr>
	    <tr><td>Last Sign In Stamp</td><td><?php echo $last_sign_in_stamp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>