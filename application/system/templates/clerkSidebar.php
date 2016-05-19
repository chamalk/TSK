<?php
include_once '../../model/dataAccess/userModel.php'
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../resources/dist/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo "Use namme"?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="clerkHome.php">
                    <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <!--ul class="treeview-menu">
                     <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                     <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                 </ul-->
            </li>

            <li>
                <a href="OrderList.php">
                    <i class="fa fa-th-list"></i> <span> New Orders</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Update Salary</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="workerPayments.php"><i class="fa fa-circle-o"></i> Worker Salary Update</a></li>
                    <li><a href="employerPayments.php"><i class="fa fa-circle-o"></i> Employer Salary Update</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-male"></i>
                    <span>Add new Employer</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="newEmployer.php"><i class="fa fa-circle-o"></i> Add New Employer</a></li>
                    <li><a href="newWorker.php"><i class="fa fa-circle-o"></i> Add New Worker</a></li>
                </ul>

            </li>

            <li>
                <a href="newDesign.php">
                    <i class="fa fa-th"></i> <span> Add New Design</span>
                </a>
            </li>

            <li>
                <a href="newMaterial.php">
                    <i class="fa fa-th"></i> <span> Add New Material</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>