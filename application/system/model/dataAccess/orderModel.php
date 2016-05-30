<?php
include_once 'DBConnection.php';
//include_once '../model/entity/Order.php';

//$ob = new Order();
//$ob->set_customer_ID(1);

/**
 * @param Order $order
 */
function place_order($order)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $address = $order->get_address();
    $directions = $order->get_directions();
    $ID = $order->get_ID();
    $customer_ID = $order->get_customer_ID();
//    $date=$order->get_date();
//    $time=$order->get_time();

    $stmt = $db_conn->prepare("INSERT INTO orderc (address,directions,ID, customer_ID) VALUES (?, ?, ?, ?)");
    //echo $db_conn->error;
    $stmt->bind_param("ssii", $address, $directions, $ID, $customer_ID);


    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function get_order_list()
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT orderc.ID,orderc.customer_ID,customer.name  FROM orderc LEFT OUTER JOIN customer ON orderc.customer_ID=customer.ID WHERE complete = 0";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $orderList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $orderList[$cnt] = $row["ID"] . " " . $row["customer_ID"] . " " . $row["name"];
            $cnt++;
        }
        return $orderList;
    }
}

function get_order_details($id)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM orderc where id = ?");
    $stmt->bind_param("s", $id);
    // execute the query
    $stmt->execute();
    if (!($result = $stmt->get_result())) {
        echo "Error " . $stmt->error;
    }
    if ($result->num_rows > 0) {
        $orderProfile = array();
        $row = $result->fetch_assoc();
        $orderProfile[0] = $row["ID"];
        $orderProfile[1] = $row["date"];
        $orderProfile[2] = $row["time"];
        $orderProfile[3] = $row["address"];
        $orderProfile[4] = $row["directions"];
        return $orderProfile;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}

function get_salesman_list()
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT staff_ID FROM salesman";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $salesmanList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $salesmanList[$cnt] = $row["staff_ID"];
            $cnt++;
            var_dump($salesmanList);
        }
        return $salesmanList;
    }
}

function allocateSalesman($id)
{
    $salesmanID = $id->get_salesman_ID();
    $clerkID = $id->get_clerkID();
    $orderID = $id->get_ID();
    $customerID = $id->get_customer_ID();


//echo $salesmanID;
    $db_conn = DBConnection::get_database_connection(); // get the db connection
//    $timestamp = CURRENT_TIMESTAMP;
    $stmt = $db_conn->prepare("INSERT INTO orderclerk (salesmanID,clerk_staff_ID,order_ID, order_customerID,salesmanallocateTime) VALUES (?, ?, ?, ?,CURRENT_TIMESTAMP)");
    $stmt->bind_param("ssii", $salesmanID, $clerkID, $orderID, $customerID);
    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function get_salesman_allocation($orderID)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT * FROM orderclerk WHERE order_ID = $orderID";
    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }
    if ($result->num_rows > 0) {
        $sql2 = "SELECT forwardTime FROM orderclerk WHERE order_ID = $orderID";
        $result2 = $db_conn->query($sql2);

        $row = $result2->fetch_assoc();
        $value2 = $row["forwardTime"];

        if ($value2 == "0000-00-00 00:00:00") {
            $result2 = 0;
        } else {
            $result2 = 1;
        }

        if ($result2) {
            $out = 1;
        } else {
            $out = 2;
        }
        return $out;
    }

    else
    {
        $out = '0';
        return $out;
    }
}

function forward_workshop($orderID)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection


    $stmt = "UPDATE orderclerk SET forwardTime=CURRENT_TIMESTAMP WHERE order_ID=$orderID";
    $db_conn->query($stmt);

    DBConnection::close_database_connection($db_conn);
}


function get_customer_register_date($id)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM login where staff_id = ?");
    $stmt->bind_param("s", $id);
    // execute the query
    $stmt->execute();
    if (!($result = $stmt->get_result())) {
        echo "Error " . $stmt->error;

    }
    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $reg_date = $row["regester_date"];
        return $reg_date;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}

?>