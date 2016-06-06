<?php

include_once 'DBConnection.php';


function login_check($user_name,$password)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM login where userName = ? AND password = ?");// prepare
    $stmt->bind_param("ss", $user_name,$password);
    // execute the query
    $stmt->execute() ;
    /*  Naming convention:
        Customer-CU
        Clerk-C
        Salesman-S
        Workshop-W
        StoreKeeper-SK
        Admin-A
        Driver-D */

    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows==0)
    {
        return "N";
    }
    else{
        $row=$result->fetch_assoc();
        $staff_ID=$row["staff_ID"];

        if(is_clerk($staff_ID))
        {
            return "C";
        }elseif(is_salesman($staff_ID))
        {
            return "S";
        }elseif(is_workshop($staff_ID))
        {
            return "W";
        }else
            return "A";
        }

    $stmt->close();
    DBConnection::close_database_connection($db_conn);
}

function login_check_customer($user_name,$password)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM customerlogin where userName = ? AND password = ?");// prepare
    $stmt->bind_param("ss", $user_name,$password);
    // execute the query
    $stmt->execute() ;
    /*  Naming convention:
        Customer-C
         */

    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows==0)
    {
        return "N";
    }
    else{
        $row=$result->fetch_assoc();
        $customer_ID=$row["customer_ID"];

        if(is_customer($customer_ID))
        {
            return "C";
        }
    }

    $stmt->close();
    DBConnection::close_database_connection($db_conn);
}

function is_customer($customer_ID)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM customer where ID = ?");
    $stmt->bind_param("i", $customer_ID);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows==0)
    {
        return false;
    }
    return true;
}

function is_clerk($staff_id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM clerk where staff_ID = ?");
    $stmt->bind_param("s", $staff_id);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows==0)
    {
        return false;
    }
    return true;
}

function is_salesman($staff_id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM salesman where id = ?");
    $stmt->bind_param("s", $staff_id);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows==0)
    {
        return false;
    }
    return true;
}

function get_user_id($user_name,$password)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT staff_ID FROM login where userName = ? AND password = ?");// prepare
    $stmt->bind_param("ss", $user_name,$password);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        $staff_id=$row["staff_ID"];
        return $staff_id;
    }
    return null;
}

function get_customer_id($user_name,$password)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT customer_ID FROM customerlogin where userName = ? AND password = ?");// prepare
    $stmt->bind_param("ss", $user_name,$password);
    // execute the query
    $stmt->execute() ;
    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        $customer_id=$row["customer_ID"];
        return $customer_id;
    }
    return null;
}
?>