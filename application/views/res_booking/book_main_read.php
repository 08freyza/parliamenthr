<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>
    <h2 style="margin-top:0px">Book_main Read</h2>
    <table class="table">
        <tr>
            <td>Booking No</td>
            <td><?php echo $booking_no; ?></td>
        </tr>
        <tr>
            <td>Requester</td>
            <td><?php echo $requester; ?></td>
        </tr>
        <tr>
            <td>Request For</td>
            <td><?php echo $request_for; ?></td>
        </tr>
        <tr>
            <td>Resource Type</td>
            <td><?php echo $resource_type; ?></td>
        </tr>
        <tr>
            <td>Resource Name</td>
            <td><?php echo $resource_name; ?></td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td><?php echo $start_date; ?></td>
        </tr>
        <tr>
            <td>End Date</td>
            <td><?php echo $end_date; ?></td>
        </tr>
        <tr>
            <td>Notes</td>
            <td><?php echo $notes; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="<?php echo site_url('res_booking') ?>" class="btn btn-default">Cancel</a></td>
        </tr>
    </table>
</body>

</html>