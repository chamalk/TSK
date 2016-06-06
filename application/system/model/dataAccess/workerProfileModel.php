<?php
include_once 'DBConnection.php';

function get_worker_details($id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM customer where id = ?");
    $stmt->bind_param("s", $id);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows >0)
    {
        $customerProfile=array();
        $row = $result->fetch_assoc();
        $customerProfile[0] = $row["ID"];
        $customerProfile[1] = $row["name"];
        $customerProfile[2] = $row["conNo"];
        $customerProfile[3] = $row["address"];
        $customerProfile[4] = $row["emailAddress"];
        return $customerProfile;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}

function edit_worker_details($customer)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $name=$customer->get_name();
    $conNo=$customer->get_conNo();
    $address=$customer->get_address();
    $emailAddress=$customer->get_emailAddress();
    $ID = $customer->get_ID();
    echo $ID;
    $stmt = "UPDATE customer SET name='$name', conNo='$conNo', address='$address', emailAddress= '$emailAddress' WHERE ID = '$ID'";
//    $stmt = $db_conn->prepare("UPDATE customer SET (name,conNo,address,emailAddress) VALUES (?, ?, ?, ?) WHERE ID = $ID");
//    $stmt->bind_param("ssss", $name,$conNo,$address,$emailAddress);
    // execute the query
    mysqli_query($db_conn,$stmt);

    DBConnection::close_database_connection($db_conn);
}

function insert_worker_details($worker)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $db_conn->autocommit(FALSE);

    $name=$worker->get_name();
    $conNo=$worker->get_conNo();
    $address=$worker->get_address();
    $ID=$worker->get_ID();
    $type=$worker->get_type();
    $nic=$worker->get_nic();
    $username=$worker->get_userName();
    $password = $worker->get_password();

    $stmt1 = $db_conn->prepare("INSERT INTO staff (name,contactNo,address,ID,nic) VALUES (?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssss", $name,$conNo,$address,$ID,$nic);
    $result1=$stmt1->execute() ;

    //Insert login details
    $stmt2 = $db_conn->prepare("INSERT INTO login (userName,password,staff_ID) VALUES (?, ?, ?)");
    $stmt2->bind_param("sss", $username,$password,$ID);
    $result2=$stmt2->execute() ;

    //Insert to categorized tables

    $stmt3 = $db_conn->prepare("INSERT INTO worker (staff_ID,type) VALUES (?, ?)");
    $stmt3->bind_param("ss",$ID,$type);
    $result3=$stmt3->execute() ;

    if ($result1 and $result2 and $result3)
    {
        $db_conn->commit();
        $db_conn->autocommit(TRUE);
        echo 'valied input model';
        return 1;
    }

    DBConnection::close_database_connection($db_conn);
    echo 'invalied input model';
    return 0;
}

?>