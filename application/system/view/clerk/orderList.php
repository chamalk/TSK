<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/header.php';
include '../../templates/clerkSidebar.php';
include '../../model/dataAccess/orderModel.php';
?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>New Order List
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="clerkHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="orderList.php"><i class="fa fa-dashboard"></i> New Order List</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> On going orders</h3>
                    </div><!-- /.box-header -->
                    <form action="orderClerk.php" method="get">
                        <div class="box-body">
                            <div class="list-group" id="order_list">
                                <?php
                                if (sizeof(get_order_list_delivery()) != 0) {
                                    foreach (get_order_list() as $block) {
                                        list($orderID, $customerID, $name) = explode(" ", $block); ?>
                                        <a href="orderClerk.php?o_id=<?php echo $orderID ?>&c_id=<?php echo $customerID ?>"
                                           class="list-group-item" id="<?= $orderID ?>">
                                        <span class="badge">Order ID: <?= $orderID ?> Customer ID: <?= $customerID ?>
                                        </span><?= $name ?>
                                        </a>
                                    <?php }
                                } else {
                                    echo "No new orders";
                                }
                                ?>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
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
<script type="text/javascript">
    $("document").ready(function () {
        function get_orders() {
            //alert('test');
            var order_array = <?php echo json_encode(get_order_list()); ?>;
            //var course_array = JSON.parse(service);
            var index;
            var ul = document.getElementById("order_list");
            for (index = 0; index < order_array.length; index++) {
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(order_array[index]));
                ul.appendChild(li);
            }
        }
    });
</script>
</body>
</html>