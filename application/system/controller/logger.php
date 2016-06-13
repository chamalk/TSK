<?php
include_once '../model/dataAccess/loginModel.php';
$uname =$_POST['username'];
$hashed_password = crypt($_POST["password"],"mal");

$result= login_check($uname,$hashed_password);

if($result=="N")
{
    header('Location: ../index.php'."?"."error=1");
}
elseif($result=="C"){
    session_start();
    $_SESSION["id"] = get_user_id($uname,$hashed_password);
    header('Location: ../view/clerk/clerkHome.php');
}
elseif($result=="S"){
    session_start();
    $_SESSION["id"] =get_user_id($uname,$hashed_password);
    header('Location: ../view/salesman/salesmanHome.php');
}
elseif($result=="A"){
    session_start();
    $_SESSION["id"] =get_user_id($uname,$hashed_password);
    header('Location: ../view/admin/adminHome.php');
}
elseif($result=="D"){
    session_start();
    $_SESSION["id"] =get_user_id($uname,$hashed_password);
    header('Location: ../view/driver/driverHome.php');
}
elseif($result=="W"){
    session_start();
    $_SESSION["id"] =get_user_id($uname,$hashed_password);
    header('Location: ../view/supervisor/supervisorHome.php');
}
?>