<?php
include_once '../model/dataAccess/salaryPaymentModel.php';
session_start();
$userID=$_SESSION["id"];

$ID=$_POST['id'];
$month=$_POST['month'];
$clerkID=$userID;
$staffID=$_POST['s_id'];
record_payment($ID,$month,$clerkID,$staffID);
header('Location: ../view/clerk/clerkHome.php');
?>