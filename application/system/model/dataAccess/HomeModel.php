<?php
include_once 'DBConnection.php';
function get_customer_count()
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT COUNT(*)AS no FROM customer");
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $count=$row["no"];
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return $count;
}

function get_staff_count()
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT COUNT(*)AS no FROM staff");
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $count=$row["no"];

    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return $count;
}
function get_order_count()
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT COUNT(*)AS no FROM order");
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $count=$row["no"];

    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return $count;
}

function get_workers_count()
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT COUNT(*)AS no FROM worker");
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows!=0)
    {
        $row=$result->fetch_assoc();
        $count=$row["no"];

    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return $count;
}

?>