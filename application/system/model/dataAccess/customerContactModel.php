<?php
include_once 'DBConnection.php';
include_once '../model/entity/CustomerContact.php';

/**
 * @param CustomerContact $contact
 */
function add_question($contact)
{
    $db_conn=DBConnection::get_database_connection(); // get the db connection

    $question=$contact->get_question();
    $ID=$contact->get_ID();
    $customer_ID=$contact->get_customer_ID();
//    $date=$order->get_date();
//    $time=$order->get_time();

    $stmt = $db_conn->prepare("INSERT INTO contact (question,ID, customer_ID) VALUES (?, ?, ?)");
    //echo $db_conn->error;
    $stmt->bind_param("sii", $question,$ID,$customer_ID);


    // execute the query
    $stmt->execute();
    $stmt->close();

    DBConnection::close_database_connection($db_conn);
}
?>