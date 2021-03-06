<?php
include_once 'DBConnection.php';
function get_user_name($id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT name FROM staff where ID = ?");
    $stmt->bind_param("s", $id);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }

    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $name=$row["name"];
        return $name ;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}

function get_customer_name($id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT name FROM customer where ID = ?");
    $stmt->bind_param("s", $id);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }

    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $name=$row["name"];
        return $name ;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}



function get_user_register_date($id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM login where staff_id = ?");
    $stmt->bind_param("s", $id);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;

    }
    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $reg_date=$row["regester_date"];
        return $reg_date;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}
?>