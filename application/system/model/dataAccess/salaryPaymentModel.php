<?php
include_once 'DBConnection.php';



function record_payment($ID,$month,$clerkID,$staffID)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection

    $stmt = $db_conn->prepare("INSERT INTO salarypayment (ID,month,clerk_staff_ID,salaryMethod_staff_ID,date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss",$ID,$month,$clerkID,$staffID,date("Y/m/d"));
    if(!$stmt->execute())
    {
        echo $stmt->error;
        return false;
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
}

function get_payment_info($payment_id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT payment_id,amount,payment_method,paymonth,paydate FROM course_payment where payment_id = ? ");// prepare
    $stmt->bind_param("i", $payment_id);
    // execute the query
    $stmt->execute() ;


    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows!=0)
    {
        $info_array=array();
        $cnt=0;
        while($row = $result->fetch_assoc()) {
            $info_array[$cnt]=array($row["payment_id"],$row["amount"],$row["payment_method"],$row["paymonth"],$row["paydate"]);
            $cnt++;
        }
        return $info_array;

    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}

function get_person_data($id)
{

    $staff= new Staff();
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM staff where ID = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    if (!($result = $stmt->get_result())) {
        echo "Error " . $stmt->error;
    }

    if ($result->num_rows != 0) {

        $row = $result->fetch_assoc();
        $staff->set_name($row["name"]);
        $staff->set_nic($row["NIC"]);
        $staff->set_conNo($row["contactNo"]);
        $staff->set_address($row["address"]);
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);

    return $staff;
}

function get_amount($id)
{
    $db_conn = DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT amount FROM salarymethod where staff_ID = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    if (!($result = $stmt->get_result())) {
        echo "Error " . $stmt->error;
    }
    if ($result->num_rows != 0) {

        $row = $result->fetch_assoc();
        $amount= $row["name"];
    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return $amount;
}

function get_new_id()
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT ID  FROM salarypayment ORDER BY ID DESC LIMIT 1";

    if(!($result = $db_conn->query($sql)))
    {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $last_id=$row["ID"];
        $last_id=$last_id+1;
        return $last_id;
    }
}


function get_payment_list($student_id,$course_id,$order_id)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $stmt = $db_conn->prepare("SELECT * FROM course_payment WHERE (course_id= ?) OR  (student_id= ?) OR (course_id= ? AND student_id= ?) OR (payment_id= ?);
");// prepare
    $stmt->bind_param("ssssi",$course_id,$student_id,$course_id,$student_id,$order_id);
    // execute the query
    $stmt->execute() ;


    if(!($result= $stmt->get_result()))
    {
        echo "Error " . $stmt->error;
    }
    if($result->num_rows!=0)
    {
        $info_array=array();
        $cnt=0;
        while($row = $result->fetch_assoc()) {
            $payment=new Payment();
            $payment->setOrderId($row["payment_id"]);
            $payment->setCourseId($row["course_id"]);
            $payment->setStudentId($row["student_id"]);
            $payment->setPaydate($row["paydate"]);
            $payment->setPaymonth($row["paymonth"]);
            $payment->setAmount($row["amount"]);
            $info_array[$cnt]=$payment;
            $cnt++;
        }
        return $info_array;

    }
    $stmt->close();
    DBConnection::close_database_connection($db_conn);
    return null;
}

function get_payment_id_list()
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection
    $sql = "SELECT scheme_id  FROM payment_scheme ORDER BY scheme_id ASC";

    if(!($result = $db_conn->query($sql)))
    {
        echo "Error " . $db_conn->error;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $id_array=array();
        $cnt=0;
        while($row = $result->fetch_assoc()) {
            $id_array[$cnt]=$row["scheme_id"];
            $cnt++;
        }
        return $id_array;
    }
    return null;
}

?>