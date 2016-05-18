<?php
include_once '../model/dataAccess/customerProfileModel.php';
include_once '../model/entity/Customer.php';
session_start();
$userID= $_SESSION["id"];

$customer=new customer();
$name = $_POST["name"];
$conNo = $_POST["conNo"];
$address = $_POST["address"];
$emailAddress=$_POST["email"];

$customer->set_name($name);
$customer->set_conNo($conNo) ;
$customer->set_address($address);
$customer->set_emailAddress($emailAddress);
$customer->set_ID($userID);

edit_customer_details($customer);

header('Location: ../view/customer/customerHome.php'."?"."error=0");
?>