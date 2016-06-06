<?php
include_once '../model/dataAccess/employerProfileModel.php';
include_once '../model/entity/Clerk.php';
include_once '../model/entity/Salesman.php';
include_once '../model/entity/Driver.php';
include_once '../model/entity/Storekeeper.php';
include_once '../model/entity/Supervisor.php';
include_once '../model/entity/Admin.php';

$name = $_POST["name"];
$ID = $_POST["ID"];
$conNo = $_POST["conNo"];
$address = $_POST["address"];
$nic=$_POST["nic"];
$username=$_POST["uname"];
$hashed_password = crypt($_POST["password"],"mal");
$category = $_POST["category"];

if($category == "Clerk")
{
    $employer = new Clerk();
}

elseif($category == "Salesman")
{
    $employer = new Salesman();
}

elseif($category == "Supervisor")
{
    $employer = new Supervisor();
}

elseif($category == "Storekeeper")
{
    $employer = new Storekeeper();
}

elseif($category == "Admin")
{
    $employer = new Admin();
}

else
{
    $employer = new Driver();
}



$employer->set_name($name);
$employer->set_conNo($conNo) ;
$employer->set_address($address);
$employer->set_ID($ID);
$employer->set_userName($username);
$employer->set_password($hashed_password);
$employer->set_nic($nic);

$validity = insert_employer_details($employer);
if($validity == 0 )
{
    echo 'invalid input';
}
else
{
    echo 'valied input';
    header('Location: ../view/clerk/clerkHome.php'."?"."error=0");
}

//header('Location: ../view/clerk/clerkHome.php'."?"."error=0");
?>