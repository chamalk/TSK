<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/customerHeader.php'; ?>
<?php include '../../templates/customerSidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
        if (isset($_GET["error"])) {
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        } ?>
        <h1>Contact Us
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="customerHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="viewCustomerProfile.php"> Contact Us </a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add Question</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="../../controller/contactController.php" method="post">
                        <div class="box-danger">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="place"> What is in your mind?</label>
                                    <input type="text" class="form-control" name="question" placeholder="Enter the Question">
                                </div>

                                <p class="text-muted">Answer will be sent to your email</p>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">HCK Soltions</a>.</strong> All rights reserved.
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