<?php
include_once '../model/dataAccess/customerProfileModel.php';
include_once '../model/entity/Customer.php';

$customer=new customer();

$name = $_POST["name"];
$conNo = $_POST["conNo"];
$address = $_POST["address"];
$emailAddress=$_POST["email"];
$ID = 2;

echo $name ." ". $conNo;

$customer->set_name($name);
$customer->set_conNo($conNo) ;
$customer->set_address($address);
$customer->set_emailAddress($emailAddress);
$customer->set_ID($ID);

edit_customer_details($customer);

header('Location: ../view/customer/editCustomerProfile'."?"."error=0");
?>