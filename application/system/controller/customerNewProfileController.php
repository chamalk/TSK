<?php
include_once '../model/dataAccess/customerProfileModel.php';
include_once '../model/entity/Customer.php';

$customer=new Customer();
$name = $_POST["name"];
$conNo = $_POST["conNo"];
$address = $_POST["address"];
$emailAddress=$_POST["email"];
$username=$_POST["uname"];
$hashed_password = crypt($_POST["password"],"mal");

$customer->set_name($name);
$customer->set_conNo($conNo) ;
$customer->set_address($address);
$customer->set_emailAddress($emailAddress);
$customer->set_userName($username);
$customer->set_password($hashed_password);

insert_customer_details($customer);

header('Location: ../index.php'."?"."error=0");
?>