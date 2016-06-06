<?php
include_once 'DBConnection.php';

function get_customer_details($id)
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

function edit_customer_details($customer)
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

function insert_customer_details($customer)
{

    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $name=$customer->get_name();
    $conNo=$customer->get_conNo();
    $address=$customer->get_address();
    $emailAddress=$customer->get_emailAddress();
    $username=$customer->get_userName();
    $password = $customer->get_password();

    $stmt1 = $db_conn->prepare("INSERT INTO customer (name,conNo,address,emailAddress) VALUES (?, ?, ?, ?)");
    $stmt1->bind_param("ssss", $name,$conNo,$address,$emailAddress);
    $stmt1->execute() ;

//Get customer ID
    $stmt3 = "SELECT ID FROM customer order by ID DESC limit 1";
    $result = $db_conn->query($stmt3);
    if(!($result))
    {
        echo "Error " . $stmt3->error;
    }
    if($result->num_rows >0)
    {
        $row = $result->fetch_assoc();
        $customerID = $row["ID"];
        echo $customerID;
    }

    //Insert login details
    $stmt2 = $db_conn->prepare("INSERT INTO customerlogin (userName,password,customer_ID) VALUES (?, ?, ?)");
    $stmt2->bind_param("ssi", $username,$password,$customerID);
    $stmt2->execute() ;

    DBConnection::close_database_connection($db_conn);
}

?>