<?php
include '../model/dataAccess/orderModel.php';
header('Content-Type: application/json');

$orderID = $_POST['order_id'];

$obj = get_salesman_allocation($orderID);
echo json_encode($obj);

?>