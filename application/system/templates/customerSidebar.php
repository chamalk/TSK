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
         <p><?php echo "User name"?></p>
         <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
       </div>
     </div>

     <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu">
       <li class="header">MAIN NAVIGATION</li>
         <li class="treeview">
             <a href="customerHome.php">
                 <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
             </a>
             <!--ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul-->
         </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-user"></i>
           <span>My Profile</span>
         </a>
         <ul class="treeview-menu">
           <li><a href="viewCustomerProfile.php"><i class="fa fa-circle-o"></i> View</a></li>
           <li><a href="editCustomerProfile.php"><i class="fa fa-circle-o"></i> Edit</a></li>
         </ul>
       </li>

       <li>
           <a href="placeOrder.php">
               <i class="fa fa-th"></i> <span> Create New Order</span>
           </a>
       </li>
         <li>
             <a href="customerContact.php">
                 <i class="fa fa-phone"></i> <span> Contact Us</span>
             </a>
         </li>
     </ul>
   </section>
   <!-- /.sidebar -->
 </aside>