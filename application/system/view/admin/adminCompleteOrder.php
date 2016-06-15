<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/header.php';
include '../../templates/adminSidebar.php';
include '../../model/dataAccess/orderModel.php';
include '../../model/dataAccess/customerProfileModel.php';
?>

<div class="content-wrapper">

    <?php $orderID = $_GET['o_id']; ?>
    <?php $customerID = $_GET['c_id']; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Order details
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="adminHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="adminCompleteOrderList.php"> Complete order List</a></li>
            <li><a href="adminCompleteOrder.php"> Order Details</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Details</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $detail = get_customer_details($customerID) ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Name</strong>
                        <p class="text-muted"><?php echo $detail[1] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Customer ID</strong>
                        <p class="text-muted"><?php echo $detail[0] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Contact Number</strong>
                        <p class="text-muted"><?php echo $detail[2] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Home Address</strong>
                        <p class="text-muted"><?php echo $detail[3] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
                        <p class="text-muted"><?php echo $detail[4] ?></p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order Details</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $detail = get_Order_details($orderID) ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Order ID</strong>
                        <p class="text-muted" id="check"><?php echo $detail[0] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Date</strong>
                        <p class="text-muted"><?php echo $detail[1] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Time</strong>
                        <p class="text-muted"><?php echo $detail[2] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Address of the Location</strong>
                        <p class="text-muted"><?php echo $detail[3] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Direction of the Location</strong>
                        <p class="text-muted"><?php echo $detail[4] ?></p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Salesman Allocation</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $detail = get_salesman_details($orderID) ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Salesman ID</strong>
                        <p class="text-muted"><?php echo $detail[0] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Salesman Name</strong>
                        <p class="text-muted"><?php echo $detail[1] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Time Stamp</strong>
                        <p class="text-muted"><?php echo $detail[2] ?></p>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->

            <div class="col-xs-6">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Measurements</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $detail = get_measurements_details($orderID) ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Height</strong>
                        <p class="text-muted" id="check"><?php echo $detail[0] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Width</strong>
                        <p class="text-muted"><?php echo $detail[1] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Motor</strong>
                        <p class="text-muted"><?php echo $detail[2] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Material</strong>
                        <p class="text-muted"><?php echo $detail[3] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Design</strong>
                        <p class="text-muted"><?php echo $detail[4] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> More Details</strong>
                        <p class="text-muted"><?php echo $detail[5] ?></p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Forward to Workshop </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php $detail = get_forward_details($orderID) ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Clerk ID</strong>
                        <p class="text-muted"><?php echo $detail[0] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Clerk Name</strong>
                        <p class="text-muted"><?php echo $detail[1] ?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Time Stamp</strong>
                        <p class="text-muted"><?php echo $detail[2] ?></p>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Workshop Status</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="list-group">
                            <?php
                            if (sizeof(get_order_status($orderID)) != 0) {
                                foreach (get_order_status($orderID) as $block) {
                                    list($date, $session, $status) = explode(" ", $block); ?>
                                    <?php $status1 = str_replace('_', ' ', $status);
                                    $space = "|";
                                    ?>
                                    </span><?= $date ?> </span><?= $space ?>
                                    </span><?= $session ?> </span><?= $space ?>
                                    </span><?= $status1 ?>
                                <?php }
                            } else {
                                echo "No new orders";
                            }
                            ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include '../../templates/js.php'; ?>
<!-- DataTables -->
<script src="../../resources/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../resources/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../resources/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../resources/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../resources/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../resources/plugins/listgroup/listgroup.js"></script>
<script src="../../resources/plugins/listgroup/listgroup.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>