<?php
include_once '../model/dataAccess/orderModel.php';
include_once '../model/entity/Order.php';

$order=new Order();

$directions = $_POST["directions"];
$address = $_POST["address"];
$customerID = 2;
$ID = 1;

echo $directions ." ". $address ." ".$customerID ." ". $ID;

$order->set_directions($directions);
$order->set_address($address) ;
$order->set_customer_ID($customerID);
$order->set_ID($ID);

place_order($order);

header('Location: ../view/customer/customerHome.php'."?"."error=0");
?>