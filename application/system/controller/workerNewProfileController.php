<?php
include_once '../model/dataAccess/workerProfileModel.php';
include_once '../model/entity/Worker.php';


$name = $_POST["name"];
$conNo = $_POST["conNo"];
$address = $_POST["address"];
$ID=$_POST["ID"];
$type=$_POST["category"];
$nic=$_POST["nic"];
$username=$_POST["uname"];
$hashed_password = crypt($_POST["password"],"mal");

$worker=new Worker();
$worker->set_name($name);
$worker->set_conNo($conNo) ;
$worker->set_address($address) ;
$worker->set_ID($ID);
$worker->set_type($type);
$worker->set_nic($nic);
$worker->set_userName($username);
$worker->set_password($hashed_password);

$validity = insert_worker_details($worker);

if($validity == 0 )
{
    echo 'invalid input';
}
else
{
    echo 'valied input';
}
header('Location: ../view/clerk/clerkHome.php'."?"."error=0");
?>