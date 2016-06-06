<?php
include_once '../../model/dataAccess/userModel.php';
session_start();
$userID=$_SESSION["id"];
?>

<header class="main-header">
  <!-- Logo -->
  <a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>T</b>SK</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>TSK</b> Engineering</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../../resources/dist/img/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo get_user_name($userID)?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../../resources/dist/img/user.png" class="img-circle" alt="User Image">
              <p><?php echo "userID"?>
                <small>User ID - <?php echo " " ?> </small>
                <small>Member Since - <?php echo " "?> </small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="../../index.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
