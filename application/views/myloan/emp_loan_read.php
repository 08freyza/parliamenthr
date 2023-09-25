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
        <h2 style="margin-top:0px">Emp_loan Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Requestdate</td><td><?php echo $requestdate; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Startpayment</td><td><?php echo $startpayment; ?></td></tr>
	    <tr><td>Remark</td><td><?php echo $remark; ?></td></tr>
	    <tr><td>Loanprocess</td><td><?php echo $loanprocess; ?></td></tr>
	    <tr><td>Installmentamount</td><td><?php echo $installmentamount; ?></td></tr>
	    <tr><td>Loanperiod</td><td><?php echo $loanperiod; ?></td></tr>
	    <tr><td>Interest</td><td><?php echo $interest; ?></td></tr>
	    <tr><td>Totalpayment</td><td><?php echo $totalpayment; ?></td></tr>
	    <tr><td>Balance</td><td><?php echo $balance; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('myloan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>