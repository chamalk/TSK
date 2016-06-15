<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/header.php';
?>
<?php include '../../templates/clerkSidebar.php'; ?>

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
        <ol class="breadcrumb">
            <li><a href="clerkHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="newEmployer.php"> Add new Employer</a></li>
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
                        <h3 class="box-title"> Add Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="../../controller/employerNewProfileController.php" data-toggle="validator" method="post">
                        <div class="box-danger">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="place"> Name</label>
                                    <input type="text" class="form-control" name="name" required pattern="[a-zA-Z ]+" placeholder="Enter your name">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option selected="selected" >Clerk</option>
                                        <option>Salesman</option>
                                        <option>Supervisor</option>
                                        <option>Storekeeper</option>
                                        <option>Driver</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="place"> Staff ID</label>
                                    <input type="text" class="form-control" name="ID" placeholder="Enter your name">
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
                                    <label for="place"> NIC Number</label>
                                    <input type="text" class="form-control" name="nic" placeholder="Enter your email address">
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