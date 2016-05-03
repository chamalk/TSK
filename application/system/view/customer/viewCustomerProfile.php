<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php include '../../templates/header.php';
include '../../templates/customerSidebar.php';
include '../../model/dataAccess/customerProfileModel.php' ?>
<?php $userID = 2; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
        if(isset($_GET["error"])){
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        }?>
        <h1>My Profile<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="customerHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="viewCustomerProfile.php"> My Profile</a></li>
        </ol>
    </section>

<!--    Main content-->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- My profile Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $detail = get_customer_details(2) ?>
                        <strong><i class="fa fa-book margin-r-5"></i>  Name</strong>
                        <p class="text-muted"><?php echo $detail[1]?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Customer ID</strong>
                        <p class="text-muted"><?php echo $detail[0]?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Contact Number</strong>
                        <p class="text-muted"><?php echo $detail[2]?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Home Address</strong>
                        <p class="text-muted"><?php echo $detail[3]?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
                        <p class="text-muted"><?php echo $detail[4]?>k</p>

                        <!-- Edit profile Button-->
                        <a href="editCustomerProfile.php" class="btn btn-primary btn-block"><b>Edit My Profile</b></a>
                    </div>
        </div>
    </section>

</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">Microfuse Soltions</a>.</strong> All rights reserved.
</footer>
<div class="control-sidebar-bg"></div>

<?php include '../../templates/js.php'; ?>
<!-- Select2 -->
<script src="../../resources/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../resources/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../resources/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../resources/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- SlimScroll -->
<script src="../../resources/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../resources/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../resources/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../resources/dist/js/demo.js"></script>
<!-- page script -->
</body>
</html>

