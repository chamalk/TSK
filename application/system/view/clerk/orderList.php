<html>
<head>
    <?php include '../../templates/css.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
include '../../templates/header.php';
include '../../templates/clerkSidebar.php';
?>
<?php include '../../model/dataAccess/orderModel.php'; ?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Order List<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Order List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order List</h3>
                    </div><!-- /.box-header -->
                    <form action="progress_single_student.php" method="get">
                        <div class="box-body">
                            <div class="list-group" id="order_list">
<!--                                --><?php
//                                foreach(get_order_list() as $block) {
//                                    list($std_id, $first_name, $last_name) = explode(" ", $block); ?>
<!--                                    <a href="progress_single_student.php?s_id=--><?php //echo $std_id ?><!--" class="list-group-item">-->
<!--                                        <span class="badge">Student ID: --><?//= $std_id ?><!--</span>-->
<!--                                        --><?//=$first_name." ".$last_name?>
<!--                                    </a>-->
<!--                                --><?php //}
                                ?>
                            </div>
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
</body>
</html>