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
                <p><?php echo 'UserName' ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="salesmanHome.php">
                    <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <!--ul class="treeview-menu">
                     <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                     <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                 </ul-->
            </li>

            <li>
                <a href="orderListSalesman.php">
                    <i class="fa fa-th"></i> <span> My new Orders</span>
                </a>
            </li>

            <li>
                <a href="orderHistory.php">
                    <i class="fa fa-th"></i> <span> Completed orders</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>