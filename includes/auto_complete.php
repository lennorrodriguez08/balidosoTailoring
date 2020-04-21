<?php

require 'handler.php';


if (isset($_POST['query']))
{
    $inpText = $_POST['query'];
    $query = "SELECT DISTINCT fullname FROM customers WHERE fullname LIKE '%$inpText%'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result))
            {
                echo "<p style='cursor: pointer'>".$row['fullname']."</p>";
            }
    }
    else
    {
        echo "<p style='cursor: pointer'>No record</p>";
    }
}
else {
    //code
}

?>