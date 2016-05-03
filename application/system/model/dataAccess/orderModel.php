<?php
include_once 'DBConnection.php';
include_once '../model/entity/Order.php';

$ob = new Order();
$ob->set_customer_ID(1);

/**
 * @param Order $order
 */
function place_order($order)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection

    $address=$order->get_address();
    $directions=$order->get_directions();
    $ID=$order->get_ID();
    $customer_ID=$order->get_customer_ID();
//    $date=$order->get_date();
//    $time=$order->get_time();

    $stmt = $db_conn->prepare("INSERT INTO orderc (address,directions,ID, customer_ID) VALUES (?, ?, ?, ?)");
    //echo $db_conn->error;
    $stmt->bind_param("ssii", $address,$directions,$ID,$customer_ID);


    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function get_order_list($id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT name FROM customer where id = ?");
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
        return $name;
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