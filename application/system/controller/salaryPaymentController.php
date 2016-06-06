<?php
include '../model/entity/Staff.php';
include '../model/dataAccess/salaryPaymentModel.php';

header('Content-Type: application/json');

$final_result = array();

if (isset($_POST['functionname'])) {
    if ('search' == $_POST['functionname']) {
        $final_result['data_list'] = search($_POST['s_id']);
        echo json_encode($final_result);
    }
}


function search($id)
{
//    error_reporting(E_ERROR);
//    alert($id);
//    $id = $_POST['s_id'];

    $data_list = '';

    $obj = get_person_data($id);

    $data_list .= $obj->get_name() . ',';
    $data_list .= $obj->get_nic() . ',';
    $data_list .= $obj->get_conNo() . ',';
    $data_list .= $obj->get_address() . ',';
    $data_list .= get_amount($id);

    return $data_list;
}

?>