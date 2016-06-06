<?php
include_once '../model/dataAccess/loginModel.php';
$uname =$_POST['username'];
$hashed_password = crypt($_POST["password"],"mal");

$result= login_check_customer($uname,$hashed_password);

if($result=="N"){
    header('Location: ../index.php'."?"."error=1");
}
elseif($result=="C"){
    session_start();
    $_SESSION["id"] =get_customer_id($uname,$hashed_password);
    header('Location: ../view/customer/customerHome.php');
}

?>