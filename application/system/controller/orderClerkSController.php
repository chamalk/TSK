<?php
include_once '../model/dataAccess/orderModel.php';
include_once '../model/entity/Order.php';

$order = new Order();
$salesman_ID = $_GET['category'];
$customer_ID = $_REQUEST["customerID"];
$order_ID = $_REQUEST["orderID"];
session_start();
$clerkID = $_SESSION["id"];
//echo $salesman_ID;

$order->set_salesman_ID($salesman_ID);
$order->set_customer_ID($customer_ID);
$order->set_ID($order_ID);
$order->set_clerkID($clerkID);

allocateSalesman($order);

header('Location: ../view/clerk/clerkHome.php' . "?" . "error=0");
?>