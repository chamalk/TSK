<html>
<head>
    <?php
    include '../../model/data_access/PaymentModel.php';
    include '../../model/data_access/CourseModel.php';
    include '../../templates/css.php';
    ?>
    <script>
        function autofill() {
            var id=document.getElementById("s_id").value;
            if(id!=""){
                jQuery.ajax({
                    type: "POST",
                    url: '../../controller/PaymentController.php',
                    dataType: 'json',
                    data: {s_id: id},
                    success:function (obj)  {
                        document.getElementById("firstname").value = obj[0];
                        document.getElementById("lastname").value = obj[1];
                        document.getElementById("mobile").value = obj[2];
                        if(obj[0]==null){
                            alert("No such student ID exits");
                        }
                    }
                });
            }
        }
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include '../../templates/header.php';
    include '../../templates/sidebarClarical.php'
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Record Payment
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Payments</a></li>
                <li class="active">Register Payment</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Billing Information</b></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form action="../../controller/PaymentRecordController.php" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Order No</label>
                                    <input type="text" id="order_id" name="order_id" class="form-control" value="<?php echo get_new_id();?>" readonly="readonly" placeholder="<?php echo get_new_id();?>" ><br>
                                    <label>Student ID</label>
                                    <input type="text"id="s_id" name="s_id"class="form-control" placeholder="Enter student id " onfocusout="autofill()" ><br>
                                    <label>First Name</label>
                                    <input type="text" id="firstname" name="first_name"class="form-control" placeholder="First name" disabled><br>
                                    <label>Last Name</label>
                                    <input type="text" id="lastname" name="last_name"class="form-control" placeholder="Last name" disabled><br>
                                    <label>Contact Number</label>
                                    <input type="text"id="mobile" name="s_phone" class="form-control" placeholder="Contact number" disabled><br>
                                </div>
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Order Information</b></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Course</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="course">
                                        <?php $ary=get_courses(); ?>
                                        <option selected="selected"><?php echo $ary[0]; ?></option>
                                        <?php
                                        $x=1;
                                        while($x<sizeof($ary)) {
                                            ?>
                                            <option>
                                                <?php
                                                echo $ary[$x]
                                                ?>
                                            </option>
                                            <?php
                                            $x++;
                                        }
                                        ?>

                                    </select>
                                </div><!-- /.form-group -->
                                <label>Amount</label>
                                <input type="text" name="amount"class="form-control" placeholder="Enter amount"><br>
                                <label>Payment Method</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="method">
                                        <option selected="selected">Cash</option>
                                        <option>Cheque</option>
                                        <option>Visa Card</option>
                                        <option>Credit Card</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <label>Month</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="month">
                                        <option selected="selected">January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="box-footer">
                                    <br><button type="submit" class="btn btn-primary">Submit</button>
                                </div><br>
                            </div>
                        </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
                <!-- right column -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
<?php include '../../templates/js.php'; ?>
</body>
ii</html>