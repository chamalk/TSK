<?php
include_once 'DBConnection.php';

function get_employer_details($id)
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

function edit_employer_details($customer)
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

function insert_employer_details($employer)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $db_conn->autocommit(FALSE);
    $name=$employer->get_name();
    $conNo=$employer->get_conNo();
    $address=$employer->get_address();
    $ID=$employer->get_ID();
    $nic=$employer->get_nic();
    $username=$employer->get_userName();
    $password = $employer->get_password();

    $stmt1 = $db_conn->prepare("INSERT INTO staff (name,contactNo,address,ID,NIC) VALUES (?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssss", $name,$conNo,$address,$ID,$nic);
    $result1=$stmt1->execute() ;

echo $username.' '.$password.' '.$ID;
    //Insert login details
    $stmt2 = $db_conn->prepare("INSERT INTO login (userName,password,staff_ID) VALUES (?, ?, ?)");
    $stmt2->bind_param("sss", $username,$password,$ID);
    $result2=$stmt2->execute() ;

    //Insert to categorized tables
    $category = get_class($employer);
    if($category == 'Clerk')
    {
        $stmt3 = $db_conn->prepare("INSERT INTO clerk (staff_ID) VALUES (?)");
        $stmt3->bind_param("s",$ID);
        $result3=$stmt3->execute() ;
    }
    elseif($category == 'Salesman')
    {
        $stmt3 = $db_conn->prepare("INSERT INTO salesman (staff_ID) VALUES (?)");
        $stmt3->bind_param("s",$ID);
        $result3=$stmt3->execute() ;
    }
    elseif($category == 'Supervisor')
    {
        $stmt3 = $db_conn->prepare("INSERT INTO supervisor (staff_ID) VALUES (?)");
        $stmt3->bind_param("s",$ID);
        $result3=$stmt3->execute() ;
    }
    elseif($category == 'Storekeeper')
    {
        $stmt3 = $db_conn->prepare("INSERT INTO storekeeper (staff_ID) VALUES (?)");
        $stmt3->bind_param("s",$ID);
        $result3=$stmt3->execute() ;
    }
    elseif($category == 'Admin')
    {
        $stmt3 = $db_conn->prepare("INSERT INTO admin (staff_ID) VALUES (?)");
        $stmt3->bind_param("s",$ID);
        $result3=$stmt3->execute() ;
    }
    else
    {
        $stmt3 = $db_conn->prepare("INSERT INTO driver (staff_ID) VALUES (?)");
        $stmt3->bind_param("s",$ID);
        $result3=$stmt3->execute() ;
    }
    if ($result1 and $result2 and $result3)
    {
        $db_conn->commit();
        echo 'valied input model';
        return 1;
    }
    $db_conn->autocommit(TRUE);
    DBConnection::close_database_connection($db_conn);
    echo 'invalied input model';
    return 0;
}

?>