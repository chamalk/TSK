<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/newAccountHeader.php'; ?>
<?php include '../../templates/newAccountSidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
        if (isset($_GET["error"])) {
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        } ?>
        <h1>Create New Account
            <small></small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="../../controller/customerNewProfileController.php" method="post">
                        <div class="box-danger">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="place"> Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                </div>

                                <div class="form-group">
                                    <label for="place">Contact No</label>
                                    <input type="text" class="form-control" name="conNo"
                                           placeholder="Enter your contact No">
                                </div>

                                <div class="form-group">
                                    <label for="place"> Hame Address</label>
                                    <input type="text" class="form-control" name="address"
                                           placeholder="Enter your home address">
                                </div>

                                <div class="form-group">
                                    <label for="place"> Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter your email address">
                                </div>

                                <div class="form-group">
                                    <label for="place"> User Name</label>
                                    <input type="text" class="form-control" name="uname" placeholder="Enter the User Name">
                                </div>

                                <div class="form-group">
                                    <label for="place"> Password</label>
                                    <input type="text" class="form-control" id='password' name="password" placeholder="Enter the password">
                                </div>

                                <div class="form-group">
                                    <label for="place"> Re Enter the Password</label>
                                    <input type="text" class="form-control" id='rpassword' name="rpassword" placeholder=" Re Enter the password">
                                </div>

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

<script src="../../resources/dist/js/jquery-2.2.3.min.js"></script>
<!-- AdminLTE App -->
<script src="../../resources/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../resources/dist/js/demo.js"></script>
<!-- page script -->
<!--<script>-->
<!--    $('#rpassword').keypress(function(){-->
<!--        if($(this).val()==$('#password').val()){-->
<!--            alert('A');-->
<!--        }-->
<!--    });-->
<!--</script>-->
</body>
</html>