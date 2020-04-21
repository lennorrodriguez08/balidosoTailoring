<?php

require '../handler.php';


if (isset($_POST['query']))
{
    $inpText = $_POST['query'];
    $query = "SELECT * FROM test WHERE id = '$inpText'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result))
            {
                echo "<input type='text' name='id' id='' value=".$row['id'].">";
                echo "<input type='text' name='name' id='' value=".$row['fullname'].">";

                // echo "<p style='cursor: pointer'>".$row['id']."</p>";
                // echo "<p style='cursor: pointer'>".$row['fullname']."</p>";
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