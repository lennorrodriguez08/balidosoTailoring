<?php 

include "./includes/handler.php";

$query = "SELECT * FROM cashflow";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $cashflow_date = $row['cashflow_date'];
    
    date_default_timezone_set('Asia/Chongqing');
    $sample = strtotime("{$cashflow_date}");
    echo date('m d Y h:i A');
}

$strdate = "";

// $date = date('m d Y');

// $date_1 = 0;

// $timestamp = mktime($date);
// echo $timestamp;
// echo date('m d Y', $timestamp);
?>