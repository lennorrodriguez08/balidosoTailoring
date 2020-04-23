<?php

require 'handler.php';
include 'query.php';

// Global variable 
$query = new query;
$SQL_POPULATE_TABLE_MAIN = "SELECT 
    customers.transaction_no,
    customers.fullname,
    customers.date,
    customers.notes,
    customers.contact,
    customers.local,
    customers.released AS released,
    customers.delivered AS delivered,
    GROUP_CONCAT(items.prescription SEPARATOR '<br>') AS prescription,
    GROUP_CONCAT(items.price SEPARATOR '<br>') AS unit_price,
    GROUP_CONCAT(item_name SEPARATOR '<br>') AS item_name, 
    GROUP_CONCAT(items.quantity SEPARATOR '<br>') AS quantity,
    SUM((quantity * price)) AS total_price,
    customers.amount_receive,
    ((SUM(items.quantity * items.price)) - (customers.amount_receive)) AS balance
    FROM customers INNER JOIN items ON customers.transaction_no = items.transaction_no
    WHERE released = 'false' OR delivered = 'false'
    GROUP BY items.transaction_no";

$SQL_POPULATE_TABLE_MAIN_C = "SELECT 
    customers.transaction_no,
    customers.fullname,
    customers.date,
    customers.notes,
    customers.contact,
    customers.local,
    customers.released AS released,
    customers.delivered AS delivered,
    GROUP_CONCAT(items.prescription SEPARATOR '<br>') AS prescription,
    GROUP_CONCAT(items.price SEPARATOR '<br>') AS unit_price,
    GROUP_CONCAT(item_name SEPARATOR '<br>') AS item_name, 
    GROUP_CONCAT(items.quantity SEPARATOR '<br>') AS quantity,
    SUM((quantity * price)) AS total_price,
    customers.amount_receive,
    ((SUM(items.quantity * items.price)) - (customers.amount_receive)) AS balance
    FROM customers INNER JOIN items ON customers.transaction_no = items.transaction_no
    WHERE released = 'true' AND delivered = 'true'
    GROUP BY items.transaction_no";





// Update measurement
if (isset($_POST['save']))
{
    $coat = $_POST['coat-shoulder'];
    $length = $_POST['coat-length'];
    $arm_1= $_POST['coat-arm-length-middle'];
    $arm_2= $_POST['coat-arm-length-left'];
    $arm_3= $_POST['coat-arm-length-right'];
    $chest = $_POST['coat-body-chest'];
    $waist = $_POST['coat-body-waist'];
    $hips = $_POST['coat-body-hips'];
    $armhole = $_POST['coat-body-arm-hole'];
    $down = $_POST['coat-body-down'];
    $front = $_POST['coat-body-front'];
    $back = $_POST['coat-body-back'];

    $b_shoulder = $_POST['barong-shoulder'];
    $b_length = $_POST['barong-length'];
    $b_ls_left = $_POST['barong-ls-left'];
    $b_ls_right = $_POST['barong-ls-right'];
    $b_ss_left = $_POST['barong-ss-left'];
    $b_ss_right = $_POST['barong-ss-right'];
    $b_body_chest = $_POST['barong-body-chest'];
    $b_body_waist = $_POST['barong-body-waist'];
    $b_body_hips = $_POST['barong-body-hips'];
    $b_arm_hole = $_POST['barong-arm-hole'];
    $b_neck = $_POST['barong-neck'];
    $b_slit = $_POST['barong-slit'];

    $p_waist_line = $_POST['pants-waist-line'];
    $p_hips = $_POST['pants-hips'];
    $p_arm_hole = $_POST['pants-arm-hole'];
    $p_length = $_POST['pants-length'];
    $p_crotch = $_POST['pants-crotch'];
    $p_legs = $_POST['pants-legs'];
    $p_knee = $_POST['pants-knee'];
    $p_bottom = $_POST['pants-bottom'];
    $pleats = $_POST['pleats'];

    $fullname = $_POST['search'];

    // This line fetch the ID of the customer
    $id = $query->findId("transaction_no", "customers", "fullname", "$fullname");

    // This line updates the coat table
    $query->updateCoat($coat, $length, $arm_1, $arm_2, $arm_3, $chest, $waist, $hips, $armhole, $down, $front, $back, $id);

    // This line updates the barong table
    $query->updateBarong($b_shoulder, $b_length, $b_ls_left, $b_ls_right, $b_ss_left, $b_ss_right, $b_body_chest, $b_body_waist, $b_body_hips, $b_arm_hole, $b_neck, $b_slit, $id);

    // This line updates the pants table
    $query->updatePants($p_waist_line, $p_hips, $p_arm_hole, $p_length, $p_crotch, $p_legs, $p_knee, $p_bottom, $pleats, $id);

    $connection->close();
    header("Location: ../measurements");
    exit();
}





if (isset($_POST['print-measurement'])) {
    header("Location: ../printmeasurement.php");
}





// New transaction 
if (isset($_POST['saveCustomer']))
{
    $transaction_no = $_POST['transaction-number'];
    $fullname = $_POST['full-name'];
    $contact = $_POST['contact-no'];
    $local = $_POST['local'];
    $date = $_POST['date'];
    $amountReceive = $_POST['amtReceive'];
    // This line inserts data to tables: customers, measurement, coat, barong, pants
    $query->QUERY_INSERT_CUSTOMER($transaction_no, $fullname, $contact, $local, $date, $amountReceive);
    header("Location: ../newtransaction");
    exit();
}





// Codes for loading data on the New transaction items table
if (isset($_POST["tid"]))
{
    $tid = $_POST["tid"];
    $itm = $_POST["itm"];
    $qty = $_POST["qty"];
    $prs = $_POST["prs"];
    $prc = $_POST["prc"];
    $query->QUERY_DATA_NEW_TRANSACTION($tid, $itm, $qty, $prs, $prc);
}





// Codes for realtime calculation on newtransaction field
if (isset($_POST["calculatePrice"]))
{
    $tid = $_POST["calculatePrice"];
    $sql = "SELECT SUM(price) AS sum_price FROM items WHERE transaction_no = '$tid'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    echo $row["sum_price"];
    $connection->close();
}





// Codes for populating datas on the transactionrecord table
if (isset($_POST["populateTable"]))
{
    $query->QUERY_POPULATE_RECORDS_TABLE($SQL_POPULATE_TABLE_MAIN, "editModal");
}





// Codes for populating datas on the transactionrecord completed table
if (isset($_POST["populateTable_c"]))
{
    $query->QUERY_POPULATE_RECORDS_TABLE($SQL_POPULATE_TABLE_MAIN_C, "editModal_c");
}




if (isset($_POST["getVal"]))
{
    $fullname = $_POST["getVal"];
    $query->QUERY_GET_PRINT_VALUES($fullname);
}




// Codes for "edit" modal on the transactionrecords active
if (isset($_POST["dataId"]))
{
    $id = $_POST["dataId"];
    $query->QUERY_EDIT_MODAL($id);
}


// Codes for "edit" modal on the transactionrecords completed
if (isset($_POST["dataId_c"]))
{
    $id = $_POST["dataId_c"];
    $query->QUERY_EDIT_MODAL($id);
}



// Codes for events on modal form
if (isset($_POST["buttonType"]))
{
    $id = $_POST["id3"];
    $id2 = $_POST["id2"];
    $buttonType = $_POST["buttonType"];
    $query->QUERY_MODAL_FORM($id, $id2, $buttonType);
}




// These line of codes is for saving the transaction records from the modal form
if (isset($_POST["saveTransactionRecord"]))
{
    $amount_receive = $_POST["amtReceive"];
    $id = $_POST["id"];
    $query->QUERY_SAVE_TRANSACTION_RECORD($prc, $amount_receive, $id);
}





// These line of codes ssves the input on notes textarea to the dataabase
if (isset($_POST["cancelTransactionRecord"]))
{
    $query->QUERY_CANCEL_TRANSACTION();
}





// These line of codes saves the input on notes textarea to the database
if (isset($_POST["saveNoteValue"]))
{
    $valueOfNotes = $_POST["saveNoteValue"];
    $dataIdofNotes = $_POST["dataIdofNotes"];
    $query->QUERY_NOTES($valueOfNotes, $dataIdofNotes);
}





// These line sorts the data active task 
if (isset($_POST["sortData"]))
{
    $sortName = $_POST["sortName"];
    $sortTransNo = $_POST["sortTransNo"];
    $sortDateFrom = $_POST["sortDateFrom"];
    $sortDateTo = $_POST["sortDateTo"];
    $sortStatus = $_POST["sortStatus"];
    $query->QUERY_SORT_DATA($sortName, $sortTransNo, $sortDateFrom, $sortDateTo, $sortStatus);
}





// These line sorts the data active task 
if (isset($_POST["sortData_c"]))
{
    $sortName = $_POST["sortName"];
    $sortTransNo = $_POST["sortTransNo"];
    $sortDateFrom = $_POST["sortDateFrom"];
    $sortDateTo = $_POST["sortDateTo"];
    $query->QUERY_SORT_DATA_C($sortName, $sortTransNo, $sortDateFrom, $sortDateTo);
}





// These line of codes is for saving realtime price for each items
if (isset($_POST["editPrice"]))
{
    $dataId = $_POST["dataId"];
    $inputAmount  = $_POST["inputAmount"];
    $trans_no = $_POST["trans_no"];
    $query->QUERY_UPDATE_PRICE($inputAmount, $dataId, $trans_no);
}





// These line of codes sorts the data from status
if (isset($_POST["statusQry"]))
{
    $dataId = $_POST["dataId"];
    $status = $_POST["status"];
    $statusQry = $_POST["statusQry"];
    $query->QUERY_UPDATE_STATUS($status, $dataId, $statusQry);
    header("Location: ../transactionrecords.php");
}