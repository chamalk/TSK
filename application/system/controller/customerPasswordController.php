<?php
include_once '../model/dataAccess/customerContactModel.php';
include_once '../model/entity/CustomerContact.php';

$contact=new CustomerContact();

$question = $_POST["question"];
session_start();
$customerID= $_SESSION["id"];

$contact->set_question($question);
$contact->set_customer_ID($customerID);
$contact->set_ID($ID);

add_question($contact);

header('Location: ../view/customer/customerHome.php'."?"."error=0");
?>