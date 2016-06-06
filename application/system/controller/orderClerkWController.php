<?php
include_once '../model/dataAccess/orderModel.php';

$order_ID = $_REQUEST["orderID"];

forward_workshop($order_ID);

header('Location: ../view/clerk/clerkHome.php' . "?" . "error=0");
?>