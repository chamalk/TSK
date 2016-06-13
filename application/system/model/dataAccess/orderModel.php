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
    $sql = "SELECT orderc.ID,orderc.customer_ID,customer.name
    FROM orderc LEFT OUTER JOIN customer ON orderc.customer_ID=customer.ID WHERE complete = 0";

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
        $out = 0;
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

function get_order_list_salesman($userID)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT orderclerk.order_ID,orderclerk.order_customerID,customer.name  FROM orderclerk LEFT OUTER JOIN customer ON orderclerk.order_customerID=customer.ID WHERE orderclerk.forwardTime = '0000-00-00 00:00:00'";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $orderList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $orderList[$cnt] = $row["order_ID"] . " " . $row["order_customerID"] . " " . $row["name"];
            $cnt++;
        }
        return $orderList;
    }
}

function get_order_confirmation($orderID)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT height FROM measurements WHERE order_ID = $orderID";
    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $value = $row["height"];

        if (is_null($value)) {
            $result1 = 0;
        } else {
            $result1 = 1;
        }

        if ($result1) {
            $out = 1;
        } else {
            $out = 0;
        }
        return $out;
    }

    else
    {
        $out = 0;
        return $out;
    }
}

function get_material_list()
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT name FROM materialdesign WHERE MD = 'M'";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $materialList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $materialList[$cnt] = $row["name"];
            $cnt++;
        }
        return $materialList;
    }
}

function get_design_list()
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT name FROM materialdesign WHERE MD = 'D'";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $designList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $designList[$cnt] = $row["name"];
            $cnt++;
        }
        return $designList;
    }
}

function addMeasurements($order)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $height = $order->get_height();
    $width = $order->get_width();
    $motor = $order->get_motor();
    $material = $order->get_material();
    $design = $order->get_design();
    $details = $order->get_measurementDetails();
    $customer_ID = $order->get_customer_ID();
    $order_ID = $order->get_ID();
    $salesman_ID = $order->get_salesman_ID();

    $stmt = $db_conn->prepare("INSERT INTO measurements
    (height,width,motor,material,design,more_details,order_customer_ID,order_ID,salesman_staff_ID)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssiis", $height, $width, $motor, $material, $design, $details, $customer_ID, $order_ID, $salesman_ID);


    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function confirm_order($orderID)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection


    $stmt = "UPDATE measurements SET date=CURRENT_TIMESTAMP WHERE order_ID=$orderID";
    $db_conn->query($stmt);

    DBConnection::close_database_connection($db_conn);
}

function get_order_list_workshop()
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT orderclerk.order_ID,orderclerk.order_customerID,customer.name
    FROM (orderclerk JOIN customer ON orderclerk.order_customerID=customer.ID)
      LEFT OUTER JOIN supcomplete ON orderclerk.order_ID = supcomplete.order_ID
    WHERE orderclerk.forwardTime > 0 AND isnull(supcomplete.timeStamp)";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $orderList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $orderList[$cnt] = $row["order_ID"] . " " . $row["order_customerID"] . " " . $row["name"];
            $cnt++;
        }
        return $orderList;
    }
}

function addStatus($order)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $fdate = $order->get_status_date();
    $session = $order->get_status_session();
    $status = $order->get_status();
    $details = $order->get_status_details();
    $customer_ID = $order->get_customer_ID();
    $order_ID = $order->get_ID();
    $supervisor_ID = $order->get_supervisorID();

    $date1 = str_replace("/","-",$fdate);
    $date = date('Y-m-d', strtotime($date1));

    $stmt = $db_conn->prepare("INSERT INTO status
    (order_ID,order_customer_ID,date,supervisor_staff_ID,session,status,more_details)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssss", $order_ID, $customer_ID, $date, $supervisor_ID, $session, $status, $details);


    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function sup_complete_order($order)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $orderID = $order->get_ID();
    $customerID = $order->get_customer_ID();
    $supervisor_ID = $order->get_supervisorID();

    $stmt = $db_conn->prepare("INSERT INTO supcomplete
    (supervisor_staff_ID,order_ID,customer_ID,timeStamp)
    VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("sii", $supervisor_ID, $orderID, $customerID );

    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function get_order_list_delivery()
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $sql = "SELECT supcomplete.order_ID,supcomplete.customer_ID,customer.name
    FROM (supcomplete JOIN customer ON supcomplete.customer_ID=customer.ID)
      LEFT OUTER JOIN drivercomplete ON supcomplete.order_ID = drivercomplete.order_ID
    WHERE supcomplete.timeStamp > 0 AND isnull(drivercomplete.timeStamp)";

    if (!($result = $db_conn->query($sql))) {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $orderList = array();
        $cnt = 0;
        while ($row = $result->fetch_assoc()) {
            $orderList[$cnt] = $row["order_ID"] . " " . $row["customer_ID"] . " " . $row["name"];
            $cnt++;
        }
        return $orderList;
    }
}

function journey_order($order)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $fdate = $order->get_journey_date();
    $journey_from = $order->get_journey_from();
    $journey_to = $order->get_journey_to();
    $journey_startT = $order->get_journey_startT();
    $journey_endT = $order->get_journey_endT();
    $customer_ID = $order->get_customer_ID();
    $order_ID = $order->get_ID();
    $driver_ID = $order->get_driver();

    $date1 = str_replace("/","-",$fdate);
    $journey_date = date('Y-m-d', strtotime($date1));

    $stmt = $db_conn->prepare("INSERT INTO journey
    (driver_staff_ID,order_ID,order_customer_ID,date,jfrom,jto,startT,endT)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siisssss", $driver_ID, $order_ID, $customer_ID, $journey_date, $journey_from,
        $journey_to, $journey_startT, $journey_endT);

    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}

function driver_complete_order($order)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection

    $orderID = $order->get_ID();
    $customerID = $order->get_customer_ID();
    $driver_ID = $order->get_driver();
    $payment = $order->get_payment();

    echo $orderID;
    echo $customerID;
    echo $driver_ID;
    echo $payment;

    $stmt = $db_conn->prepare("INSERT INTO drivercomplete
    (driver_staff_ID,order_ID,customer_ID,finalPayment,timeStamp)
    VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("siis", $driver_ID, $orderID, $customerID, $payment);

    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}
?>