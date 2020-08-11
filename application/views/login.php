<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/fav.jpg" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/fav.jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Memo Online</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url()?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" /> -->
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='<?php echo base_url()?>assets/iconfont/material-icons.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="main-panel primary">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- <div class="col-md-4 col-md-offset-3 fade-in one"> -->
                        <div class="col-md-4 col-md-offset-3">
                            <form action="<?php echo base_url(); ?>backend/login" method="post" novalidate="" class="ng-untouched ng-pristine ng-valid">
                            <div class="card card-login">
                                <div class="card-header text-center" data-background-color="green">
                                    <h4 class="card-title"><img src="<?php echo base_url() ?>/assets/img/Plasindo.PNG" alt="homepage" class="light-logo" width="200px" height="38px" /></h4>
                                    <!-- <div class="social-line">
                                        <a class="btn btn-just-icon btn-simple" href="#btn">
                                            <i class="material-icons">content_paste</i>
                                        </a>
                                        <a class="btn btn-just-icon btn-simple" href="#pablo">
                                            <i class="material-icons">code</i>
                                        </a>
                                        <a class="btn btn-just-icon btn-simple" href="#eugen">
                                            <i class="material-icons">cloud</i>
                                        </a>
                                    </div> -->
                                </div><br>
                                <p class="category text-center">
                                    MEMO ONLINE
                                </p>
                                    
                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <!-- <i class="material-icons">face</i> -->
                                        </span>
                                        <div class="form-group label-floating is-empty">
                                            <!-- <label class="control-label">Username</label> -->
                                            <input class="form-control" name="username" id="username" type="text" placeholder="Username">
                                        <span class="material-input"></span></div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <!-- <i class="material-icons">lock_outline</i> -->
                                        </span>
                                        <div class="form-group label-floating is-empty">
                                            <!-- <label class="control-label">Password</label> -->
                                            <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                                        <span class="material-input"></span></div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button name="masuk" id="masuk" class="btn btn-rose btn-simple btn-wd btn-lg" type="submit">Login</button>
                                </div>
                                    <p class='category text-center alert' data-background-color='green'>&nbsp;<?php echo $this->session->flashdata('error'); ?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<!-- <script src="<?php echo base_url()?>assets/js/chartist.min.js"></script> -->
<!--  Dynamic Elements plugin -->
<!-- <script src="<?php echo base_url()?>assets/js/arrive.min.js"></script> -->
<!--  PerfectScrollbar Library -->
<!-- <script src="<?php echo base_url()?>assets/js/perfect-scrollbar.jquery.min.js"></script> -->
<!--  Notifications Plugin    -->
<!-- <script src="<?php echo base_url()?>assets/js/bootstrap-notify.js"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url()?>assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="<?php echo base_url()?>assets/js/demo.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</html>