<html>
<head>
    <?php
    include '../../model/dataAccess/salaryPaymentModel.php';
    //    include '../../model/data_access/CourseModel.php';
    include '../../templates/css.php';
    ?>
    <script>
        function autofill() {
            var id=document.getElementById("s_id").value;
            if(id!=""){
                jQuery.ajax({
                    type: "POST",
                    url: '../../controller/salaryPaymentController.php',
                    dataType: 'json',
                    data: {s_id: id},
                    success:function (obj)  {
                        document.getElementById("name").value = obj[0];
                        document.getElementById("nic").value = obj[1];
                        document.getElementById("contactNo").value = obj[2];
                        document.getElementById("address").value = obj[3];
                        document.getElementById("paymentSch").value = obj[4];

                        if(obj[0]==null){
                            alert("No such staff ID exits");
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
    include '../../templates/clerkSidebar.php'
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Record Payment
            </h1>
            <ol class="breadcrumb">
                <li><a href="clerkHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="clerkHome.php">Update Salary</a></li>
                <li class="active">Worker Salary Update</li>
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
                        <form action="../../controller/salaryRecordController.php" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Payment No</label>
                                    <input type="text" id="id" name="id" class="form-control" value="<?php echo get_new_id();?>" readonly="readonly" placeholder="<?php echo get_new_id();?>" ><br>
                                    <label>Staff ID</label>
                                    <input type="text"id="s_id" name="s_id"class="form-control" placeholder="Enter staff id " onfocusout="autofill()" ><br>
                                    <label>Name of the Employer</label>
                                    <input type="text" id="name" name="name"class="form-control" placeholder="Name" disabled><br>
                                    <label>NIC Number</label>
                                    <input type="text" id="nic" name="nic"class="form-control" placeholder="NIC" disabled><br>
                                    <label>Contact Number</label>
                                    <input type="text"id="contactNo" name="contactNo" class="form-control" placeholder="Contact number" disabled><br>
                                    <label>Address</label>
                                    <input type="text"id="address" name="address" class="form-control" placeholder="Address" disabled><br>
                                    <label>Payment Scheme</label>
                                    <input type="text"id="paymentSch" name="paymentSch" class="form-control" placeholder="Payment Scheme" disabled><br>
                                </div>
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Payment Information</b></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Category</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="method">
                                        <option selected="selected">Workshop</option>
                                        <option>Dilivery</option>

                                    </select>
                                </div><!-- /.form-group -->
                                <!--                                <label>Amount</label>-->
                                <!--                                <input type="text" name="amount" class="form-control" value="--><?php //$s_id = $_POST['s_id'];
                                //                                       echo get_amount($s_id);?><!--" readonly="readonly" placeholder="--><?php //echo get_amount($s_id);?><!--" ><br>-->
                                <label>Payment Method</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="method">
                                        <option selected="selected">Cash</option>
                                        <option>Cheque</option>
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