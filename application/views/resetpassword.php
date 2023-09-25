<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Parliament HR Management System</title>
    <meta name="description" content="Parliament HR Management System" />
    <meta name="keywords" content="hr, hris, hrms, vanuatu, system, information" />
    <meta name="author" content="CNS, Ltd." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="<?= base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Alerts CSS -->
    <link href="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Alert -->
    <?php if ($this->session->flashdata('message')) : ?>
        <div hidden id="message-login-page">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form ml-auto mr-auto no-float">
                        <table class="logo-center">
                            <tr>
                                <a href="<?= base_url(); ?>dashboard">
                                    <td align="center">
                                        <img class="" src="<?= base_url(); ?>assets/dist/img/logo-3.png" width="150" height="153" alt="brand" />
                                    </td>
                                </a>
                            </tr>
                            <tr>
                                <td>
                                    <span class="brand-text">Parliament HR Management System</span>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-20">
                                    <h4 class="text-center txt-dark">Reset Password</h4>
                                </div>
                                <div class="form-wrap">
                                    <form method="post" action="<?= base_url() ?>forgot_password/reset_process">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <input type="hidden" name="email" value="<?= $email ?>">
                                        <input type="hidden" name="token" value="<?= $token ?>">
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">New Password</label>
                                            <div class="clearfix"></div>
                                            <input type="password" class="form-control" name="newpass" id="exampleInputpwd_2" placeholder="Enter password" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_3">Confirm New Password</label>
                                            <div class="clearfix"></div>
                                            <input type="password" class="form-control" name="newpassconfirm" id="exampleInputpwd_3" placeholder="Enter confirm new password" value="" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info btn-rounded" style="margin-top: 18px;">Change Password</button>&nbsp;
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src=" <?= base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js">
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="<?= base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Init JavaScript -->
    <script src="<?= base_url(); ?>assets/dist/js/init.js"></script>

    <!-- Custom Message Alert -->
    <script src="<?= base_url(); ?>assets/dist/js/message-alert.js"></script>
</body>

</html>