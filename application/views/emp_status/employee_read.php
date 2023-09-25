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
        <h2 style="margin-top:0px">Employee Read</h2>
        <table class="table">
	    <tr><td>Emp No</td><td><?php echo $emp_no; ?></td></tr>
	    <tr><td>Emp Name</td><td><?php echo $emp_name; ?></td></tr>
	    <tr><td>Login Id</td><td><?php echo $login_id; ?></td></tr>
	    <tr><td>Account No</td><td><?php echo $account_no; ?></td></tr>
	    <tr><td>Official Name</td><td><?php echo $official_name; ?></td></tr>
	    <tr><td>Active Status</td><td><?php echo $active_status; ?></td></tr>
	    <tr><td>Emp Status</td><td><?php echo $emp_status; ?></td></tr>
	    <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
	    <tr><td>Marital Status</td><td><?php echo $marital_status; ?></td></tr>
	    <tr><td>Birthday</td><td><?php echo $birthday; ?></td></tr>
	    <tr><td>Place Birthday</td><td><?php echo $place_birthday; ?></td></tr>
	    <tr><td>Joindate</td><td><?php echo $joindate; ?></td></tr>
	    <tr><td>Religion</td><td><?php echo $religion; ?></td></tr>
	    <tr><td>Location</td><td><?php echo $location; ?></td></tr>
	    <tr><td>Unit</td><td><?php echo $unit; ?></td></tr>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Grade</td><td><?php echo $grade; ?></td></tr>
	    <tr><td>Bank Name</td><td><?php echo $bank_name; ?></td></tr>
	    <tr><td>Blood Type</td><td><?php echo $blood_type; ?></td></tr>
	    <tr><td>Hospitalized</td><td><?php echo $hospitalized; ?></td></tr>
	    <tr><td>Medicalcond</td><td><?php echo $medicalcond; ?></td></tr>
	    <tr><td>Shoes</td><td><?php echo $shoes; ?></td></tr>
	    <tr><td>Medicaltestnotes</td><td><?php echo $medicaltestnotes; ?></td></tr>
	    <tr><td>Pants</td><td><?php echo $pants; ?></td></tr>
	    <tr><td>Medtest</td><td><?php echo $medtest; ?></td></tr>
	    <tr><td>Cloth</td><td><?php echo $cloth; ?></td></tr>
	    <tr><td>Weight</td><td><?php echo $weight; ?></td></tr>
	    <tr><td>Headsize</td><td><?php echo $headsize; ?></td></tr>
	    <tr><td>Height</td><td><?php echo $height; ?></td></tr>
	    <tr><td>Vnpf</td><td><?php echo $vnpf; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Mobile Phone</td><td><?php echo $mobile_phone; ?></td></tr>
	    <tr><td>Home Phone</td><td><?php echo $home_phone; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Department</td><td><?php echo $department; ?></td></tr>
	    <tr><td>Ministry</td><td><?php echo $ministry; ?></td></tr>
	    <tr><td>Division</td><td><?php echo $division; ?></td></tr>
	    <tr><td>Is Vnpf</td><td><?php echo $is_vnpf; ?></td></tr>
	    <tr><td>Is Emp</td><td><?php echo $is_emp; ?></td></tr>
	    <tr><td>Bankid</td><td><?php echo $bankid; ?></td></tr>
	    <tr><td>Keen</td><td><?php echo $keen; ?></td></tr>
	    <tr><td>Keendate</td><td><?php echo $keendate; ?></td></tr>
	    <tr><td>Fingerid</td><td><?php echo $fingerid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('emp_status') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>