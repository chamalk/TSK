<html>
<head>
    <?php include '../../templates/css.php'; ?>
    <script>
        function test() {

            var order_id = "<?php echo $_GET['o_id']; ?>";
            if (order_id != "") {
                jQuery.ajax
                ({
                    type: "POST",
                    url: '../../controller/salesmanController.php',
                    dataType: 'json',
                    data: {order_id: order_id},
                    success: function (obj) {
                        if (obj == "1")
                        {
                            document.getElementById("s_id").disabled = true;
                            document.getElementById("s_btn").disabled = true;
                            document.getElementById("f_btn").disabled = true;
                        }

                        if (obj == "2")
                        {
                            document.getElementById("s_id").disabled = true;
                            document.getElementById("s_btn").disabled = true;
                        }

                    }
                });
            }
        }

    </script>

</head>
<body onload="test()" class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/header.php';
include '../../templates/clerkSidebar.php';
include '../../model/dataAccess/orderModel.php';
include '../../model/dataAccess/customerProfileModel.php';
//include '../../model/dataAccess/ProgressStudentAdminModel.php';
//include_once '../../model/entity/ProgressTeacher.php';
?>

<div class="content-wrapper">

    <?php $orderID = $_GET['o_id']; ?>
    <?php $customerID = $_GET['c_id']; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Student Progress
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="clerkHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="orderList.php">New order List</a></li>
            <li><a href="orderClerk.php">New order</a></li>
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

            </div><!-- /.col -->

            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order Management</h3>
                    </div><!-- /.box-header -->
                    <div class="box-danger">
                        <div class="box-body">
                            <form action="../../controller/orderClerkSController.php" method="get">
                                <input type="hidden" name="orderID" value="<?php echo $orderID ?>">
                                <input type="hidden" name="customerID" value="<?php echo $customerID ?>">
                                <div class="form-group">
                                    <label>Salesman</label>
                                    <select class="form-control" style="width: 100%;" id="s_id" name="category">
                                        <?php
                                        $salesmanList = get_salesman_list();
                                        echo $salesmanList;
                                        foreach ($salesmanList as $a) {
                                            echo "<option> $a </option>";
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" id="s_btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-danger">
                        <div class="box-body">
                            <form action="../../controller/orderClerkWController.php" method="get">
                                <input type="hidden" name="orderID" value="<?php echo $orderID ?>">
                                <div class="form-group">
                                    <label>Forward Order to Workshop</label>
                                </div>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" id="f_btn">Forward</button>
                                </div>

                            </form>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Price Calculation</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">

                    </div><!-- /.box-body -->

                </div><!-- /.box -->

            </div>
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